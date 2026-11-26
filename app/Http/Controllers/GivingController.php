<?php

namespace App\Http\Controllers;

use App\Models\Giving;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class GivingController extends Controller
{
    public function showGivingForm()
    {
        return view('give-now');
    }

    public function redirectToGateway(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'amount' => 'required|numeric|min:100',
        ]);

        $reference = 'giving_' . Str::random(10);

        $giving = Giving::create([
            'name' => $request->name,
            'email' => $request->email,
            'amount' => $request->amount,
            'paystack_reference' => $reference,
        ]);

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . config('services.paystack.secret_key'),
                'Content-Type' => 'application/json',
                'Cache-Control' => 'no-cache',
            ])->post('https://api.paystack.co/transaction/initialize', [
                'email' => $request->email,
                'amount' => (int) ($request->amount * 100),
                'reference' => $reference,
                'callback_url' => route('giving.callback'),
                'metadata' => [
                    'full_name' => $request->name,
                    'giving_id' => $giving->id,
                ]
            ]);

            $result = $response->json();

            if ($response->successful() && $result['status']) {
                return Redirect::away($result['data']['authorization_url']);
            } else {
                $giving->status = 'failed';
                $giving->save();
                Log::error('Paystack initialization failed: ', $result);
                return back()->with('error', 'We could not process your payment. Please try again later.');
            }
        } catch (\Exception $e) {
            $giving->status = 'failed';
            $giving->save();
            Log::error('Payment failed to initialize: ' . $e->getMessage());
            return back()->with('error', 'An unexpected error occurred. Please try again later.');
        }
    }

    public function handleGatewayCallback(Request $request)
    {
        $reference = $request->query('reference');
        $giving = Giving::where('paystack_reference', $reference)->first();

        if (!$giving) {
            Log::error('Giving record not found for reference: ' . $reference);
            return view('giving-confirmation', ['status' => 'failed']);
        }

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . config('services.paystack.secret_key'),
            ])->get("https://api.paystack.co/transaction/verify/{$reference}");

            $result = $response->json();

            if ($response->successful() && $result['data']['status'] == 'success') {
                $giving->status = 'success';
                $giving->save();
                return view('giving-confirmation', ['status' => 'success']);
            } else {
                $giving->status = 'failed';
                $giving->save();
                Log::error('Paystack verification failed: ', $result);
                return view('giving-confirmation', ['status' => 'failed']);
            }
        } catch (\Exception $e) {
            $giving->status = 'failed';
            $giving->save();
            Log::error('Payment callback error: ' . $e->getMessage());
            return view('giving-confirmation', ['status' => 'failed']);
        }
    }
}
