@extends('frontend.layouts.main')

@section('content')
    <!-- fashion section start -->
    <div class="fashion_section">
        <div id="main_slider">
            <div class="container">
                <h1 class="fashion_taital">All Product</h1>
                <div class="fashion_section_2">
                    <div class="row">
                        @foreach ($product as $item)
                            <div class="col-lg-4 col-sm-4">
                                <div class="box_main">
                                    <h4 class="shirt_text">{{ $item->product_name }}</h4>
                                    <p class="price_text">Price <span style="color: #262626;">$
                                            {{ $item->product_price }}</span></p>
                                    <div class="tshirt_img">
                                        <img src="{{ asset($item->product_image) }}">
                                    </div>
                                    <div class="btn_main">
                                        <div class="buy_bt">
                                            <form action="{{ route('user.add-product-to-cart', $item->id) }}"
                                                method="POST">
                                                @csrf
                                                <div class="mb-3">
                                                    <button type="submit" class="btn btn-warning mt-3">
                                                        Buy Now
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="mt-3">
                                            <a class="btn btn-primary"
                                                href="{{ route('product-details', [$item->id, $item->slug]) }}">
                                                See More</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
