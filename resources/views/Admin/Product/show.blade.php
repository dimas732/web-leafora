@extends('layout')

@php
    $preTitle = 'Data';
    $title = 'Show Detail - Produk';
@endphp

@section('content')
    <div class="col d-flex flex-column">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-auto">
                    <img src="{{ asset('storage/' . $products->picture) }}" alt="" width="200px">
                </div>
                <div class="col-auto"><a href="{{ route('admin.product.edit', $products->id) }}" class="btn btn-dark">
                        Edit
                    </a></div>
                <div class="col-auto"><a href="#" data-bs-toggle="modal"
                        data-bs-target="#modal-small{{ $products->id }}" class="btn btn-ghost-danger">
                        Delete Produk
                    </a></div>
                <h3 class="card-title mt-4">Detail Produk</h3>
                <div class="row g-3">
                    <div class="col-md">
                        <div class="form-label">Kode Produk</div>
                        <input type="text" class="form-control" value="{{ $products->product_code }}" readonly>
                    </div>
                    <div class="col-md">
                        <div class="form-label">Nama Produk</div>
                        <input type="text" class="form-control" value="{{ $products->name }}" readonly>
                    </div>
                    <div class="col-md">
                        <div class="form-label">Kategori Produk</div>
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}" @readonly(true)>
                                    {{ old('category_id', $products->category_id) == $item->id ? '' : '' }}
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row g-3 mb-4">
                    <div class="col-md">
                        <div class="form-label">Kode Produk</div>
                        <input type="text" class="form-control" value="{{ $products->price }}" readonly>
                    </div>
                    <div class="col-md">
                        <div class="form-label">Nama Produk</div>
                        <input type="text" class="form-control" value="{{ $products->stock }}" readonly>
                    </div>
                    <div class="col-md">
                        <div class="form-label">Kategori Produk</div>
                        <input type="text" class="form-control" value="{{ $products->unit }}" readonly>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col">
                        <div class="form-label">Deskripsi Produk</div>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $products->description }}</textarea>
                    </div>
                </div>
                <div class="btn-list justify-content-start">
                    <a href="{{ route('admin.product.index') }}" class="btn">
                        Back
                    </a>
                </div>
                <div class="card-footer bg-transparent mt-auto">

                </div>
                <div class="modal modal-blur fade" id="modal-small{{ $products->id }}" tabindex="-1" role="dialog"
                    aria-hidden="true">
                    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="modal-title">Are you sure?</div>
                                <div>If you proceed, you will lose all your personal data.</div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-link link-secondary me-auto"
                                    data-bs-dismiss="modal">Cancel</button>
                                <form action="{{ route('admin.product.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
