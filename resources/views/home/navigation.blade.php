<div>
    <div class="border-b">
        <nav>
            <div class="py-3">
                <div class="d-flex justify-content-between text-xs">
                    <div class="d-flex align-items-center gap-3">
                        <a href="#" >
                            English <i class="fa fa-chevron-down" aria-hidden="true"></i>
                        </a>
                        <span class="text-black-50">|</span>
                        <a href="#">
                            PHP <i class="fa fa-chevron-down" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        @if (Route::has('login'))

                        @auth
                        <form method="POST" action="{{ route('logout') }}" style="cursor: pointer;">
                            @csrf
                            <button type="submit" style="border: none; background-color: #fff; padding: 0">
                                Logout  <i class="fa fa-sign-out" aria-hidden="true"></i>
                            </button>
                        </form>

                        @else
                        <a href="{{url('/login')}}">
                            Login <i class="fa fa-sign-in"></i>
                        </a>
                        <span class="text-black-50">|</span>
                        <a href="{{url('/register')}}">
                            Register <i class="fa fa-user-plus" aria-hidden="true"></i>
                        </a>

                        @endauth
                        @endif
                        
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <nav class="d-flex justify-content-between align-items-center py-3">
        <div>
            <h1 class="my-auto">CyberSleek</h1>
        </div>
        <div class="d-flex align-items-center">
            <input type="text" class="search-input" placeholder="Search" aria-describedby="button-addon2">
            <button class="btn btn-search" type="button" id="button-addon2">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </div>
        <div class="text-sm">
            <span>
                <i class="fa fa-truck" aria-hidden="true"></i>
                Free Shipping on Orders 500 PHP+
            </span> 
        </div>
    </nav>

    <div style="background-color: #1A1E21;">
        <nav class="text-light d-flex justify-content-between align-items-center py-3">
            <div class="d-flex gap-5 nav-links">
                <a href="{{url('/')}}">HOME</a>
                <a href="{{url('shop')}}">SHOP</a>
            </div>
            <div class="d-flex align-items-center gap-5">
                <a href="{{url('my_orders')}}" class="text-light">
                    My Orders
                </a>
                <a class="cart" href="{{url('my_cart')}}">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <span class="badge">{{$count}}</span>
                </a>
            </div>
        </nav>
    </div>
    
</div>