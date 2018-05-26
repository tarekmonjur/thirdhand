@extends('layouts.app')

@section('content')

    <!-- Product -->
    <section class="sec-pad bg-grey">
        <div class="container">
            <div class="row flx-container align-flx-center flx-off-sm">
                <div class="col-md-6">
                    <img src="image/watch3.png">
                </div>
                <div class="col-md-6">
                    <h3>Awsome and attractive watch. it is best for personal use</h3>
                    <P> We are committed to provide safe, reliable and affordable medicines as well as a customer service philosophy that is worthy of our valued customers’ loyalty.</P>
                    <a href="#" class="btn">Buy now</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Product -->

    <!-- Feature -->
    <section class="sec-pad bg-grey">
        <div class="container">
            <div class="row">
                <div class="section-text text-center">
                    <h4>Product features</h4>
                    <p>Lorem ipsum dolor sit amet menandri lobortis laboramus nec ex, ullum regione instructior duo ei.</p>
                </div>
                <div class="text-center feature clearfix">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <div class="feature-col">
                                <div class="icon-md">
                                    <span class="ti-layout-tab-window"></span>
                                </div>
                                <h6 class="fw-600">Interective design</h6>
                                <p>Lorem ipsum dolor sit amet menandri lobortis laboramus nec ex.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="feature-col">
                                <div class="icon-md">
                                    <span class="ti-image"></span>
                                </div>
                                <h6 class="fw-600">User friendly</h6>
                                <p>Lorem ipsum dolor sit amet menandri lobortis laboramus nec ex.</p>
                            </div>
                        </div><div class="col-sm-6 col-md-4">
                            <div class="feature-col">
                                <div class="icon-md">
                                    <span class="ti-settings"></span>
                                </div>
                                <h6 class="fw-600">Latest technology</h6>
                                <p>Lorem ipsum dolor sit amet menandri lobortis laboramus nec ex.</p>
                            </div>
                        </div><div class="col-sm-6 col-md-4">
                            <div class="feature-col">
                                <div class="icon-md">
                                    <span class="ti-lock"></span>
                                </div>
                                <h6 class="fw-600">High security</h6>
                                <p>Lorem ipsum dolor sit amet menandri lobortis laboramus nec ex.</p>
                            </div>
                        </div><div class="col-sm-6 col-md-4">
                            <div class="feature-col">
                                <div class="icon-md">
                                    <span class="ti-layers"></span>
                                </div>
                                <h6 class="fw-600">Install app</h6>
                                <p>Lorem ipsum dolor sit amet menandri lobortis laboramus nec ex.</p>
                            </div>
                        </div><div class="col-sm-6 col-md-4">
                            <div class="feature-col">
                                <div class="icon-md">
                                    <span class="ti-location-pin"></span>
                                </div>
                                <h6 class="fw-600">Gps tracking</h6>
                                <p>Lorem ipsum dolor sit amet menandri lobortis laboramus nec ex.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End feature -->

    <!-- FAQ -->
    <section class="sec-pad">
        <div class="container">
            <div class="row">
                <div class="clearfix">
                    <div class="row">
                        <div class="flx-container align-flx-center flx-off-sm">
                            <div class="col-md-6">
                                <img src="image/watch3.png">
                            </div>
                            <div class="col-md-6">
                                <h4>Why choose the product</h4>
                                <P> We are committed to provide safe, reliable and affordable medicines as well as a customer service philosophy that is worthy of our valued customers’ loyalty.</P>
                                <ul class="list-style">
                                    <li>Ut enim ad minim veniam quis</li>
                                    <li>adipiscing elit sed do eiusmod</li>
                                    <li>minim veniam quis nostrud</li>
                                    <li>adminim veniam quis</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End FAQ -->

    <!-- How -->
    <section class="sec-pad bg-grey">
        <div class="container">
            <div class="row">
                <div class="tab tab-vertical">
                    <div class="tab-menu col-md-4">
                        <h3 class="fw-600">How it works?</h3>
                        <div class="spce"></div>
                        <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore Ut enim ad minim veniam.</p>
                        <ul class="tab-list nav nav-tabs">
                            <li class="active">
                                <a href="#lA" data-toggle="tab">
                                    <h6 class="fw-600">Step 1</h6>
                                    <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut minim veniam.</p>
                                </a>
                            </li>
                            <li>
                                <a href="#lB" data-toggle="tab">
                                    <h6 class="fw-600">Step 2</h6>
                                    <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut minim veniam.</p>
                                </a>
                            </li>
                            <li>
                                <a href="#lC" data-toggle="tab">
                                    <h6 class="fw-600">Step 3</h6>
                                    <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut minim veniam.</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content col-md-7 text-right col-md-offset-1 ">
                        <!-- -->
                        <div class="tab-pane fade in active" id="lA">
                            <div class="img">
                                <img alt="" src="image/watch1.png">
                            </div>
                        </div>
                        <div class="tab-pane fade" id="lB">
                            <div class="img">
                                <img alt="" src="image/watch2.png">
                            </div>
                        </div>
                        <div class="tab-pane fade" id="lC">
                            <div class="img">
                                <img alt="" src="image/watch3.png">
                            </div>
                        </div>
                        <!-- -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End How -->

    <!-- order -->
    @include('layouts.order')
    <!--  -->

@endsection

@push('script')
<script src="{{asset('js/script.js')}}"></script>
@endpush