@extends('category-pages')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white p-2">
            <li class="breadcrumb-item"><a href="{{ route('landing-page') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Buah</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="container mt-4">
        <h2 class="section-title mb-4">Produk Buah Segar</h2>

        <div class="row">
            @forelse ($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="product-card">
                        <div class="product-img">
                            <img src="{{ asset('storage/' . $product->picture) }}" alt="">
                            <div class="product-action">
                                <button onclick="addToCart('Anggur', 35000, 'img/product/details/anggur.jpg')"
                                    class="btn btn-sm btn-success"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                            </div>
                        </div>
                        <div class="product-info">
                            <h5 class="text-capitalize">{{ $product->name }}</h5>
                            <p class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center w-100">Tidak ada produk di kategori ini.</p>
            @endforelse
        </div>

    </div>
@endsection
