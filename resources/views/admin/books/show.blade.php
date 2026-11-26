@extends('admin.layout.app')

@section('title', 'Admin - ' . $book->bk_title)

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">{{ $book->bk_title }}</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="/admin/index">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.books.index') }}">All Books</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">{{ $book->bk_title }}</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Book Details</h4>
                    </div>
                    <div class="card-body">
                        <p><strong>Title:</strong> {{ $book->bk_title }}</p>
                        <p><strong>Description:</strong> {{ $book->bk_desc }}</p>
                        <p><strong>Amount:</strong> {{ $book->bk_amount }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Orders</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Customer Name</th>
                                        <th>Customer Email</th>
                                        <th>Status</th>
                                        <th>Quantity</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->full_name }}</td>
                                            <td>{{ $order->email }}</td>
                                            <td>{{ $order->status }}</td>
                                            <td>{{ $order->quantity }}</td>
                                            <td>{{ $order->amount }}</td>
                                            <td>{{ $order->created_at->format('d M Y') }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">No orders found for this book.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
