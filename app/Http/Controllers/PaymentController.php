<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Book;
use App\Models\BookOrder;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendBook;

class PaymentController extends Controller
{
    /**
     * Redirect the user to the Paystack payment page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToGateway(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'nullable|string',
        ]);

        $book = Book::find($request->book_id);
        $amount = $book->bk_amount * $request->quantity;
        $reference = uniqid('book_');

        // Create a book order with a pending status
        $bookOrder = BookOrder::create([
            'name' => $request->name,
            'full_name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'book_id' => $book->id,
            'quantity' => $request->quantity,
            'amount' => $amount,
            'status' => 'pending',
            'paystack_reference' => $reference,
        ]);

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . config('services.paystack.secret_key'),
                'Content-Type' => 'application/json',
                'Cache-Control' => 'no-cache',
            ])->post('https://api.paystack.co/transaction/initialize', [
                'email' => $request->email,
                'amount' => (int) ($amount * 100), // Paystack expects amount in kobo
                'reference' => $reference,
                'callback_url' => route('payment.callback'),
                'metadata' => [
                    'book_order_id' => $bookOrder->id,
                    'book_id' => $book->id,
                    'quantity' => $request->quantity,
                    'name' => $request->name,
                    'phone' => $request->phone,
                ]
            ]);

            $result = $response->json();

            if ($response->successful() && $result['status']) {
                // Redirect to Paystack payment page
                return Redirect::away($result['data']['authorization_url']);
            } else {
                // Log the error response from Paystack
                Log::error('Paystack initialization failed: ', $result);
                $bookOrder->update(['status' => 'failed']);
                return back()->with('error', 'We could not process your payment. Please try again later.');
            }
        } catch (\Exception $e) {
            Log::error('Payment failed to initialize: ' . $e->getMessage());
            $bookOrder->update(['status' => 'failed']);
            return back()->with('error', 'An unexpected error occurred. Please try again later.');
        }
    }

    /**
     * Obtain Paystack payment information
     *
     * @return \Illuminate\Http\Response
     */
    public function handleGatewayCallback(Request $request)
    {
        $reference = $request->query('reference');

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . config('services.paystack.secret_key'),
            ])->get("https://api.paystack.co/transaction/verify/{$reference}");

            $result = $response->json();

            if ($response->successful() && $result['data']['status'] == 'success') {
                $metadata = $result['data']['metadata'];
                $bookOrder = BookOrder::find($metadata['book_order_id']);

                if ($bookOrder) {
                    $bookOrder->update([
                        'status' => 'paid',
                        'paystack_reference' => $reference,
                    ]);

                    $book = Book::find($bookOrder->book_id);
                    $downloadLink = $book->file_path ? asset('books/files/' . basename($book->file_path)) : '#';

                    // Send email with the book
                    try {
                        Log::info('Attempting to send book email to: ' . $bookOrder->email . ' for book: ' . $book->bk_title);
                        Mail::to($bookOrder->email)->send(new SendBook($bookOrder, $book, $downloadLink));
                        Log::info('Book email sent successfully to: ' . $bookOrder->email);
                    } catch (\Exception $e) {
                        Log::error('Failed to send book email: ' . $e->getMessage(), [
                            'exception' => $e,
                            'trace' => $e->getTraceAsString(),
                        ]);
                        // Don't fail the whole transaction if email fails, but log it.
                    }

                    return view('books.success', ['order' => $bookOrder, 'book' => $book, 'downloadLink' => $downloadLink]);
                } else {
                    Log::error('Book order not found for reference: ' . $reference);
                    return redirect()->route('home')->with('error', 'Book order not found. Please contact support.');
                }

            } else {
                 Log::error('Paystack verification failed: ', $result);
                return redirect()->route('home')->with('error', 'Payment verification failed. Please contact support.');
            }
        } catch (\Exception $e) {
            Log::error('Payment callback error: ' . $e->getMessage());
            return redirect()->route('home')->with('error', 'An unexpected error occurred during payment verification.');
        }
    }
}
