
@extends('layouts.app')

@section('title', 'Edit Customer')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Edit Customer</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('customers.update', $customer->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $customer->email }}" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Leave blank to keep the current password">
            </div>
            <div class="mb-3">
                <label for="account_type" class="form-label">Account Type</label>
                <select name="account_type" class="form-select">
                    <option value="basic" {{ $customer->account_type == 'basic' ? 'selected' : '' }}>Basic</option>
                    <option value="premium" {{ $customer->account_type == 'premium' ? 'selected' : '' }}>Premium</option>
                    <option value="enterprise" {{ $customer->account_type == 'enterprise' ? 'selected' : '' }}>Enterprise</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="active" {{ $customer->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $customer->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    <option value="banned" {{ $customer->status == 'banned' ? 'selected' : '' }}>Banned</option>
                </select>
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
