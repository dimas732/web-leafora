@extends('layout')

@php
    $preTitle = 'Data';
    $title = 'Edit - Categories';
@endphp

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.categories.update', $categories->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="form-label">Nama Kategori</label>
                    <input type="text" name="name" class="form-control" placeholder="Masukan nama kategori!"
                        value="{{ $categories->name }}">
                </div>
                <div class="mb-3">
                    <label for="form-label">Deskripsi</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control"
                        placeholder="Masukan deskripsi...">{{ $categories->description }}</textarea>
                </div>
                <div class="mb-3">
                    <a href="{{ route('admin.categories.index') }}" class="btn me-auto">Close</a>
                    <input type="submit" class="btn btn-primary float-end" value="Submit">
                </div>
            </form>
        </div>
    </div>
@endsection
