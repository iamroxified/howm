<?php

namespace App\Mail;

use App\Models\Book;
use App\Models\BookOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendBook extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $book;
    public $downloadLink;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(BookOrder $order, Book $book, $downloadLink)
    {
        $this->order = $order;
        $this->book = $book;
        $this->downloadLink = $downloadLink;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Congratulations, you have successfully purchased ' . $this->book->bk_title);

        try {
            // Set the markdown view for the email
            $this->markdown('emails.book_purchase', [
                'order' => $this->order,
                'book' => $this->book,
                'downloadLink' => $this->downloadLink,
            ]);
        } catch (\Exception $e) {
            // If rendering the markdown view fails, log the error and use a simple HTML fallback
            Log::error('Failed to render markdown email: ' . $e->getMessage());
            $this->html('<p>Thank you for purchasing ' . $this->book->bk_title . '. You will receive the book shortly.</p>');
        }

        // Attach the book file if it exists
        if ($this->book->file_path) {
            $fileName = basename($this->book->file_path);
            $filePath = public_path('books/files/' . $fileName);

            if (file_exists($filePath)) {
                $this->attach($filePath, [
                    'as' => $this->book->bk_title . '.pdf',
                    'mime' => 'application/pdf',
                ]);
            } else {
                Log::error('Book file not found for attachment: ' . $filePath);
            }
        }

        return $this;
    }
}

