<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class BookOrderController extends Controller
{
    public function index()
    {
        $bookOrdersQuery = BookOrder::latest();

        if (request()->has('status') && request('status') != '') {
            $bookOrdersQuery->where('status', request('status'));
        }

        $bookOrders = $bookOrdersQuery->get();
        return view('admin.book_orders.index', compact('bookOrders'));
    }

    public function requery(BookOrder $bookOrder)
    {
        if (!$bookOrder->paystack_reference) {
            return back()->with('error', 'This book order has no Paystack reference.');
        }

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . config('services.paystack.secret_key'),
            ])->get("https://api.paystack.co/transaction/verify/{$bookOrder->paystack_reference}");

            $result = $response->json();

            if ($response->successful() && $result['data']['status']) {
                $bookOrder->status = $result['data']['status'];
                $bookOrder->save();
                return back()->with('success', 'Transaction status updated successfully.');
            } else {
                Log::error('Paystack requery failed: ', $result);
                return back()->with('error', 'Failed to update transaction status.');
            }
        } catch (\Exception $e) {
            Log::error('Paystack requery error: ' . $e->getMessage());
            return back()->with('error', 'An unexpected error occurred.');
        }
    }
}
