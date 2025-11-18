@extends('layout')

@php
    $preTitle = 'Data';
    $title = 'Create - Customers';
@endphp

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.customer.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="form-label">First Name</label>
                    <input type="text" name="first_name" class="form-control" placeholder="Enter your first name!">
                </div>
                <div class="mb-3">
                    <label for="form-label">Last Name</label>
                    <input type="text" name="last_name" class="form-control" placeholder="Enter your last name!">
                </div>
                <div class="mb-3">
                    <label for="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" placeholder="Enter your phone number!">
                </div>
                <div class="mb-3">
                    <a href="{{ route('admin.customer.index') }}" class="btn me-auto">Close</a>
                    <input type="submit" class="btn btn-primary float-end" value="Submit">
                </div>
            </form>
        </div>
    </div>
@endsection
