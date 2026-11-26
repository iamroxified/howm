<x-mail::message>
# Congratulations on your book purchase!

Hi {{ $order->name }},

Thank you for purchasing **{{ $book->bk_title }}**.

You can download your book using the link below.

<x-mail::button :url="$downloadLink">
Download Book
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>