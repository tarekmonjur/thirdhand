@extends('layouts.app')

@section('content')

    <!-- Product -->
    <section class="sec-pad bg-grey">
        <div class="container">
            <div class="row flx-container align-flx-center flx-off-sm">
                <div class="col-md-6">
                    <img alt="" src="{{asset('uploads/products/'.$product->product_image)}}">
                </div>
                <div class="col-md-6">
                    <h3>
                        {{$product->product_name}}
                    </h3>
                    {!! $product->product_description !!}
                    <a href="#" class="btn">Buy now</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Product -->

    <!-- Feature -->
    {!! $product->product_feature !!}
    <!-- End feature -->

    <!-- FAQ -->
    {!! $product->product_faq !!}
    <!-- End FAQ -->

    <!-- How -->
    {!! $product->product_work !!}
    <!-- End How -->

    <!-- order -->
    @include('layouts.order')
    <!--  -->

@endsection

@push('script')
<script src="{{asset('js/script.js')}}"></script>
@endpush