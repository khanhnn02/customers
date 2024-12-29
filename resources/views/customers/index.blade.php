
@extends('layouts.app')

@section('title', 'Customer List')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Customer List</h3>
        <a href="{{ route('customers.create') }}" class="btn btn-primary btn-sm float-end">Add New Customer</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Email</th>
                    <th>Account Type</th>
                    <th>Status</th>
                    <th>Last Login</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($customers as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ ucfirst($customer->account_type) }}</td>
                        <td>
                            <span class="badge bg-{{ $customer->status === 'active' ? 'success' : ($customer->status === 'banned' ? 'danger' : 'secondary') }}">
                                {{ ucfirst($customer->status) }}
                            </span>
                        </td>
                        <td>{{ $customer->last_login }}</td>
                        <td>
                            <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this customer?')">Delete</button>
                            </form> 
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No customers found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {{ $customers->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
