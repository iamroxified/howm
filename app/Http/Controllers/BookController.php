<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookOrder;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::where('bk_stat', true)->latest()->get();
        return view('books.index', compact('books'));
    }

    /**
     * Display a listing of the resource for admin.
     */
    public function adminIndex()
    {
        $books = Book::latest()->get();
        return view('admin.books.index', compact('books'));
    }

    /**
     * Display the specified resource for admin.
     */
    public function adminShow(Book $book)
    {
        $orders = BookOrder::where('book_id', $book->id)->latest()->get();
        return view('admin.books.show', compact('book', 'orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'bk_title' => 'required|string|max:255',
            'bk_desc' => 'nullable|string',
            'bk_amount' => 'nullable|numeric',
            'bk_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'bk_link' => 'nullable|file|mimes:pdf,epub,mobi|max:100240', // 100MB max
        ]);

        $book = new Book($request->except('bk_link'));

        if ($request->hasFile('bk_img')) {
            $imageName = time().'.'.$request->bk_img->extension();
            $request->bk_img->move(public_path('books'), $imageName);
            $book->bk_img = $imageName;
        }

        if ($request->hasFile('bk_link')) {
            $fileName = time().'.'.$request->bk_link->extension();
            $request->bk_link->move(public_path('books/files'), $fileName);
            $book->bk_link = $fileName;
        }

        $book->save();

        return redirect()->route('admin.books.index')->with('success', 'Book added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('admin.books.edit', compact('book'));
    }

    /**
     * Show the checkout form for a book.
     */
    public function showCheckoutForm(Book $book)
    {
        // Only for paid books
        if ($book->bk_amount <= 0) {
            return redirect()->route('books.show', $book);
        }
        return view('books.checkout', compact('book'));
    }

    /**
     * Handle the submission of the checkout form and initiate payment.
     */
    public function initiatePayment(Request $request, Book $book)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'location' => 'nullable|string|max:255',
        ]);

        // Create the book order
        $order = BookOrder::create([
            'book_id' => $book->id,
            'user_id' => auth()->id(),
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'location' => $request->location,
            'amount' => $book->bk_amount,
            'status' => 'pending',
            'paystack_reference' => 'temp_ref_' . time(), // Temporary reference
        ]);

        // In the next step, we will redirect to Paystack.
        // For now, let's just return a success message.
        return back()->with('success', 'Your order has been placed. You will be redirected to payment.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'bk_title' => 'required|string|max:255',
            'bk_desc' => 'nullable|string',
            'bk_amount' => 'nullable|numeric',
            'bk_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'bk_link' => 'nullable|file|mimes:pdf,epub,mobi|max:10240', // 10MB max
        ]);

        $book->fill($request->except('bk_link'));

        if ($request->hasFile('bk_img')) {
            // Optional: delete old image
            if($book->bk_img && file_exists(public_path('books/' . $book->bk_img))) {
                unlink(public_path('books/' . $book->bk_img));
            }
            $imageName = time().'.'.$request->bk_img->extension();
            $request->bk_img->move(public_path('books'), $imageName);
            $book->bk_img = $imageName;
        }

        if ($request->hasFile('bk_link')) {
            // delete old file
            if($book->bk_link && file_exists(public_path('books/files/' . $book->bk_link))) {
                unlink(public_path('books/files/' . $book->bk_link));
            }
            $fileName = time().'.'.$request->bk_link->extension();
            $request->bk_link->move(public_path('books/files'), $fileName);
            $book->bk_link = $fileName;
        }

        $book->save();

        return redirect()->route('admin.books.index')->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('admin.books.index')->with('success', 'Book deleted successfully.');
    }

    /**
     * Handle the purchase of a book.
     */
    public function purchase(Request $request, Book $book)
    {
        // Only allow download if the book is free.
        if ($book->bk_amount > 0) {
            return redirect()->route('books.checkout', $book)->with('error', 'This book is not free.');
        }

        $book->increment('bk_down_count');

        if ($book->bk_link && file_exists(public_path('books/files/' . $book->bk_link))) {
            return response()->download(public_path('books/files/' . $book->bk_link));
        }

        // if no file, redirect back with error
        return back()->with('error', 'Book file not found.');
    }
}
