@extends('layout')

@php
    $preTitle = 'Data';
    $title = 'Create - Batch';
@endphp

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.batch.update', $batch->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="form-label">Kode Produk</label>
                    <select name="product_id" class="form-control select2">
                        <option value="">-- Pilih Produk --</option>
                        @foreach ($products as $p)
                            <option value="{{ $p->id }}" {{ $batch->product_id == $p->id ? 'selected' : '' }}>
                                {{ $p->product_code }} - {{ $p->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="form-label">Tanggal Kadaluwarsa</label>
                    <input type="date" name="exp_date" class="form-control" value="{{ $batch->exp_date }}">
                </div>
                <div class="mb-3">
                    <a href="{{ route('admin.batch.index') }}" class="btn me-auto">Close</a>
                    <input type="submit" class="btn btn-primary float-end" value="Submit">
                </div>
            </form>
        </div>
    </div>
@endsection
