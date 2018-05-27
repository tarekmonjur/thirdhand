@extends('layouts.app')

@section('content')

    <!-- banner -->
    <div class="hero">
        <div id="banner-carousel" class="carousel slide" data-ride="carousel" data-interval="false">
            <div class="carousel-inner">
                <!-- item -->
                <div class="item active">
                    <img alt="" src="image/home_banner.jpg">
                </div>
                <!-- /// -->

                <!-- item -->
                <div class="item">
                    <img alt="" src="image/home_banner-2.jpg">
                </div>
                <!-- /// -->

                <!-- item -->
                <div class="item">
                    <img alt="" src="image/home_banner-3.jpg">
                </div>
                <!-- /// -->

                <!-- item -->
                <div class="item">
                    <img alt="" src="image/home_banner-4.jpg">
                </div>
                <!-- /// -->

                <!-- item -->
                <div class="item">
                    <img alt="" src="image/home_banner-5.jpg">
                </div>
                <!-- /// -->
            </div>

            <ol class="carousel-indicators">
                <li data-target="#banner-carousel" data-slide-to="0" class="active">
                    <span>India ki cricketer</span>
                </li>
                <li data-target="#banner-carousel" data-slide-to="1">
                    <span>Deal of the month</span>
                </li>
                <li data-target="#banner-carousel" data-slide-to="2">
                    <span>Deal of the week</span>
                </li>
                <li data-target="#banner-carousel" data-slide-to="3">
                    <span>Amazon pay cashback</span>
                </li>
                <li data-target="#banner-carousel" data-slide-to="4">
                    <span>Refer & earn</span>
                </li>
            </ol>
        </div>
    </div>
    <!-- End Banner -->

    <!-- Feature -->
    <section class="sec-pad">
        <div class="container">
            <div class="row">
                <div class="section-text text-center">
                    <h4>Products</h4>
                    <p>Lorem ipsum dolor sit amet menandri lobortis laboramus nec ex, ullum regione instructior duo ei.</p>
                </div>
                <div class="text-center product clearfix">
                    <div class="row">
                        @foreach($products as $product)
                        <div class="col-sm-6 col-md-4">
                            <div class="product-col">
                                <div class="product-img">
                                    <img alt="" src="{{asset('uploads/products/'.$product->product_image)}}">
                                </div>
                                <h6 class="fw-600">{{$product->product_name}}</h6>
                                <div class="price">${{$product->product_price}}</div>
                                <a class="btn" href="{{url('/product/'.$product->product_slug)}}">View details</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End feature -->

    <!-- order -->
    @include('layouts.order')
    <!--  -->

@endsection

@push('script')
<script src="{{asset('js/script.js')}}"></script>
@endpush