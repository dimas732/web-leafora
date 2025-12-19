@extends('detail')

@section('content')
    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">

                <!-- Left Image -->
                <div class="col-lg-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large" src="{{ asset('storage/' . $product->picture) }}"
                                alt="{{ $product->name }}">
                        </div>
                    </div>
                </div>

                <!-- Right Content -->
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <h3>{{ $product->name }}</h3>
                        <div class="product__details__price">Rp{{ number_format($product->price, 0, ',', '.') }}</div>

                        <p>{{ $product->description }}</p>

                        <ul class="mb-4">
                            <li><b>Kategori</b> <span>{{ $product->categories->name ?? '-' }}</span></li>
                            <li><b>Stok</b> <span>{{ $product->stock > 0 ? $product->stock : 'Habis' }}</span></li>
                            <li><b>Berat/Unit</b> <span class="mb-3">{{ $product->unit ?? '-' }}</span></li>
                        </ul>

                        <div class="product__details__quantity mb-3">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="number" name="quantity" value="1" min="1"
                                        max="{{ $product->stock }}">
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="primary-btn">ADD TO CART</button>
                        </form>
                    </div>
                </div>
            </div>

            <br>

            <!-- Description Tab -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-desc"
                                    role="tab">Description</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-desc" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Product Description</h6>
                                    <p>{{ $product->description }}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Product Details Section End -->
@endsection
