@extends('layout_home')


@section('product-list1')
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Produk Unggulan</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>

                            @foreach ($categories as $category)
                                <li data-filter=".cat-{{ $category->id }}" class="text-capitalize">
                                    {{ $category->name }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                @foreach ($products as $p)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix cat-{{ $p->category_id }}">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg" data-setbg="{{ asset('storage/' . $p->picture) }}">
                                <ul class="featured__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6><a href="{{ route('product.detail', $p->id) }}"
                                        class="text-capitalize">{{ $p->name }}</a></h6>
                                <h5>Rp {{ number_format($p->price, 0, ',', '.') }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
