<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Giving;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GivingController extends Controller
{
    public function index()
    {
        $givingsQuery = Giving::latest();

        if (request()->has('status') && request('status') != '') {
            $givingsQuery->where('status', request('status'));
        }

        $givings = $givingsQuery->get();
        
        return view('admin.givings.index', compact('givings'));
    }

    public function requery(Giving $giving)
    {
        if (!$giving->paystack_reference) {
            return back()->with('error', 'This giving has no Paystack reference.');
        }

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . config('services.paystack.secret_key'),
            ])->get("https://api.paystack.co/transaction/verify/{$giving->paystack_reference}");

            $result = $response->json();

            if ($response->successful() && $result['data']['status']) {
                $giving->status = $result['data']['status'];
                $giving->save();
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
