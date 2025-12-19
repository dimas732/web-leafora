@extends('shop-grid')


{{-- @section('grid-list1')
    <div class="product__discount__slider owl-carousel">
        @foreach ($products as $item)
            <div class="col-lg-4">
                <div class="product__discount__item">
                    <div class="product__discount__item__pic set-bg" data-setbg="{{ asset('storage/' . $item->picture) }}">
                        <div class="product__discount__percent">-20%</div>
                        <ul class="product__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product__discount__item__text">
                        <span>Bahan Pokok</span>
                        <h5><a href="#" class="text-capitalize">{{ $item->name }}</a></h5>
                        <div class="product__item__price">
                            <h5>Rp {{ number_format($item->price, 0, ',', '.') }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection --}}



@section('grid-list2')
    <div class="row">
        @if (request('q'))
            <h4>
                Search result for:
                <strong>"{{ request('q') }}"</strong>
            </h4>
        @endif
        @foreach ($products as $item)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{ asset('storage/' . $item->picture) }}">
                        <ul class="product__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li>
                                <form action="{{ route('cart.add', $item->id) }}" method="POST">
                                    @csrf
                                    <button type="submit"><i class="fa fa-shopping-cart"></i></button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="{{ route('product.detail', $item->id) }}"
                                class="text-capitalize">{{ $item->name }}</a>
                        </h6>
                        <h5>Rp {{ number_format($item->price, 0, ',', '.') }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('latest-product')
    <div class="sidebar__item">
        <div class="latest-product__text">
            <h4>Latest Products</h4>

            <div class="latest-product__slider owl-carousel">
                <div class="latest-prdouct__slider__item">
                    @foreach ($latestProducts as $p)
                        <a href="#" class="latest-product__item">
                            <div class="latest-product__item__pic">
                                <img src="{{ asset('storage/' . $p->picture) }}" alt="">
                            </div>
                            <div class="latest-product__item__text">
                                <h6>{{ $p->name }}</h6>
                                <span>Rp {{ number_format($p->price, 0, ',', '.') }}</span>
                            </div>
                        </a>

                        {{-- Setiap 3 item, tutup slider dan buka slider baru --}}
                        @if ($loop->iteration % 3 == 0 && !$loop->last)
                </div>
                <div class="latest-prdouct__slider__item">
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('count-item')
    <div class="col-lg-4 col-md-4">
        <div class="filter__found">
            <h6><span>{{ $products->count() }}</span> Products found</h6>
        </div>
    </div>
@endsection
