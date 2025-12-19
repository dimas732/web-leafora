@extends('layout')

@php
    $preTitle = 'Data';
    $title = 'Create - Produk';
@endphp

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="form-label">Nama Produk</label>
                    <input type="text" name="name" class="form-control" placeholder="Masukan nama produk!">
                </div>
                <div class="mb-3">
                    <label for="form-label">Kategori</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="form-label">Harga Modal</label>
                            <input type="number" class="form-control" name="cost">
                        </div>
                        <div class="col">
                            <label for="form-label">Harga Jual</label>
                            <input type="number" class="form-control" name="price">
                        </div>
                        <div class="col">
                            <label for="form-label">Stok</label>
                            <input type="number" class="form-control" name="stock">
                        </div>
                        <div class="col">
                            <label for="form-label">Unit</label>
                            <select name="unit" id="unit" class="form-control">
                                <option value="">-- Pilih Kategori --</option>
                                <option value="Kg">Kg</option>
                                <option value="pcs">pcs</option>
                                <option value="pack">pack</option>
                                <option value="gram">gram</option>
                                <option value="ikat">ikat</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="form-label">Foto Produk</label>
                    <input type="file" class="form-control" name="picture">
                </div>
                <div class="mb-3">
                    <label for="form-label">Deskripsi</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <a href="{{ route('admin.product.index') }}" class="btn me-auto">Close</a>
                    <input type="submit" class="btn btn-primary float-end" value="Submit">
                </div>
            </form>
        </div>
    </div>
@endsection
