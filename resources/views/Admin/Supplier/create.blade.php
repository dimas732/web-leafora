@extends('layout')

@php
    $preTitle = 'Data';
    $title = 'Create - Supplier';
@endphp

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.supplier.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="form-label">Nama Supplier</label>
                    <input type="text" name="name" class="form-control" placeholder="Masukan nama supplier...">
                </div>
                <div class="mb-3">
                    <label for="form-label">Nomor Telpon</label>
                    <input type="text" name="phone" class="form-control" placeholder="Masukan kontak supplier...">
                </div>
                <div class="mb-3">
                    <label for="form-label">Alamat</label>
                    <textarea name="address" id="address" cols="30" rows="10" class="form-control"
                        placeholder="Masukan alamat..."></textarea>
                </div>
                <div class="mb-3">
                    <a href="{{ route('admin.supplier.index') }}" class="btn me-auto">Close</a>
                    <input type="submit" class="btn btn-primary float-end" value="Submit">
                </div>
            </form>
        </div>
    </div>
@endsection
