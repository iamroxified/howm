@extends('admin.layout.app')

@section('title', 'Givings')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Givings</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Givings</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.givings.index') }}" method="GET" class="mb-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="status">Filter by Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="">All</option>
                                            <option value="success" {{ request('status') == 'success' ? 'selected' : '' }}>Success</option>
                                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="failed" {{ request('status') == 'failed' ? 'selected' : '' }}>Failed</option>
                                            <option value="abandoned" {{ request('status') == 'abandoned' ? 'selected' : '' }}>Abandoned</option>
                                            <option value="paid" {{ request('status') == 'paid' ? 'selected' : '' }}>Paid</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary mt-4">Filter</button>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($givings as $giving)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $giving->name }}</td>
                                        <td>{{ $giving->email }}</td>
                                        <td>{{ $giving->amount }}</td>
                                        <td>{{ $giving->status }}</td>
                                        <td>{{ $giving->created_at->format('d M, Y H:i:s') }}</td>
                                        <td>
                                            <a href="{{ route('admin.givings.requery', $giving) }}" class="btn btn-sm btn-info">Requery</a>
                                        </td>
                                    </tr>
                                    @endforeach
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
