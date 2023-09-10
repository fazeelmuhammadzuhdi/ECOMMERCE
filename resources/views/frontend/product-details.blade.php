@extends('frontend.layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="box_main">
                    <div class="electronic_img"><img src="{{ asset($product->product_image) }}">
                    </div>

                </div>
            </div>
            <div class="col-lg-8">
                <div class="box_main">
                    <div class="product-info">
                        <h4 class="shirt_text text-left">{{ $product->product_name }}</h4>
                        <p class="price_text text-left">Price <span style="color: #262626;">$
                                {{ $product->product_price }}</span></p>
                    </div>
                    <div class="my-3 product-details text-justify">
                        {{ $product->product_long_description }}
                        <ul class="p-2 bg-light my-2">
                            <li>Product Category - {{ $product->product_category_name }} </li>
                            <li>Product Sub Category - {{ $product->product_subcategory_name }}</li>
                            <li>Available Quantity - <span style="color: #262626;">
                                    {{ $product->product_qty }}</span></li>
                        </ul>
                    </div>
                    <div class="btn_main">
                        <form action="{{ route('user.add-product-to-cart', $product->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="quantity" class="form-label">How Many Pics ?</label>
                                <input type="number" name="quantity" id="quantity" class="form-control"
                                    aria-describedby="helpId" min="1" value="0">
                                <button type="submit" class="btn btn-warning mt-3">
                                    <i class="fa fa-shopping-cart"></i> Add To Cart
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="fashion_section">
        <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <h1 class="fashion_taital">Related Product</h1>
                        <div class="fashion_section_2">
                            <div class="row">
                                @foreach ($relatedProduct as $item)
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="box_main">
                                            <h4 class="shirt_text">{{ $item->product_name }}</h4>
                                            <p class="price_text">Price <span style="color: #262626;">$
                                                    {{ $item->product_price }}</span></p>
                                            <div class="tshirt_img"><img src="{{ asset($item->product_image) }}">
                                            </div>
                                            <div class="btn_main">
                                                <div class="buy_bt">
                                                    <form action="{{ route('user.add-product-to-cart', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <input type="hidden" name="quantity" value="1">
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

        </div>
    </div>
@endsection
