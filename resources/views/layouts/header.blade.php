<header>
    <!-- navbar -->
    <nav id="navbar" class="navbar navbar-custom navbar-fixed-top" data-spy="affix" data-offset-top="200">
        <div class="container">
            <div class="row">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand page-scroll logo-light" href="{{url('/')}}"><img alt="" src="{{asset('image/logo.png')}}"></a>
                <div class="top-right">
                    @guest
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @else
                        @if(Auth::user()->type == 'admin')
                            <a href="{{ url('product-add') }}">Add Product</a>
                            <a href="{{ url('products') }}">Products</a>
                            <a href="{{ url('customers') }}">Customers</a>
                        @endif
                        <a href="{{ url('devices') }}">Device</a>
                        <a href="{{ url('device-add') }}">Add Device</a>
                        <a href="{{ url('sms-logs') }}">SMS Logs</a>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        <a href="#"><img alt="" src="{{asset('image/user.png')}}"></a>
                        {{ Auth::user()->name }}
                    @endguest
                        <a href="#"><img alt="" src="{{asset('image/call.png')}}"></a>
                        <a href="#"><img alt="" src="{{asset('image/fb.png')}}"></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- End navbar -->
    <div class="nav-space"></div>
</header>
