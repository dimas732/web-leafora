@extends('layout')

@php
    $preTitle = 'Data';
    $title = 'Edit - Customers';
@endphp

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.customer.update', $customers->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="form-label">First Name</label>
                    <input type="text" name="first_name" class="form-control" value="{{ $customers->first_name }}"
                        placeholder="Enter your first name!">
                </div>
                <div class="mb-3">
                    <label for="form-label">Last Name</label>
                    <input type="text" name="last_name" class="form-control" value="{{ $customers->last_name }}"
                        placeholder="Enter your last name!">
                </div>
                <div class="mb-3">
                    <label for="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{ $customers->phone }}"
                        placeholder="Enter your phone number!">
                </div>
                <div class="mb-3">
                    <a href="{{ route('admin.customer.index') }}" class="btn me-auto">Close</a>
                    <input type="submit" class="btn btn-primary float-end" value="Submit">
                </div>
            </form>
        </div>
    </div>
@endsection
