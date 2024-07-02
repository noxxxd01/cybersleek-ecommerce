<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CyberSleek</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
</head>
<body>
    <!-- navigation -->
    @include('home.navigation')
    <!-- /navigation -->

    <div class="page-bread">
        <img class="breadcrumb m-0" src="{{asset('images/breadcrumb.jpg')}}" alt="">
        <section class="d-flex justify-content-center">
            <div class="text-light mt-5 d-flex gap-4 align-items-center inside-bread">
                <span>Home</span>
                <i class="fa fa-chevron-right" aria-hidden="true"></i>
                <span class="fw-bold">Cart</span>
            </div>
        </section>
    </div>

    <div style="background-color: #e7e7e7">
        <section class="py-5">
            <div class="d-flex mx-auto gap-3">
                <div class="d-flex flex-grow-1 flex-column">
                    <?php
                        $value = 0;
                    ?>
                    @foreach($cart as $cart)
                    <div class="flex-shrink-1 bg-light p-3 mb-2">
                        <div class="row">
                            <div class="col-2">
                                <img src="/products/{{$cart->product->image}}" alt="" style="width:6rem; height:6rem">
                            </div>
                            <div class="col-md-8">
                                <p class="fs-5 mb-0">{{$cart->product->name}}</p>
                                <p style="font-size:0.9rem; color: #5d5d5d">Category: <span>{{$cart->product->category}}</span></p>
                                <div class="d-flex gap-4 align-items-center">
                                    <span class="fs-6 fw-bold">₱{{$cart->product->price}}</span>
                                </div>
                            </div>
                            <div class="col-md-2 text-center my-auto">
                                <a href="">
                                    &#10005;
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                        $value = $value + $cart->product->price
                    ?>
                    @endforeach
                </div>
                <form class="col-md-4 bg-light p-3 mb-auto" action="{{ url('confirm_order') }}" method="POST">
                    @csrf
                    <div>
                        <h3 class="fs-4 mb-4">Cart Summary</h3>
                        <div class="py-3" style="border-top:0.7px solid #d1d1d1; border-bottom:0.7px solid #d1d1d1">
                            <span class="d-flex justify-content-between">
                                <span>Subtotal: </span>
                                <span>{{$value}}</span>
                            </span>
                            <span class="d-flex justify-content-between mb-3">
                                <span>Shipping fee: </span>
                                <span>100</span>
                            </span>
                            <span class="d-flex justify-content-between fw-bold">
                                <span>Total: </span>
                                <span>{{$value+100}}</span>
                            </span>
                        </div>
                        <div class="py-3 px-2" style="border-bottom:0.7px solid #d1d1d1; font-size:0.9rem;">
                            <span class="d-flex justify-content-between">
                                <span>Name: </span>
                                <input type="text" name="name" value="{{Auth::user()->name}}" style="border:none; text-align:right; outline:none">
                            </span>
                            <span class="d-flex justify-content-between">
                                <span>Address: </span>
                                <input type="text" name="address" value="{{Auth::user()->address}}" style="border:none; text-align:right; outline:none">
                            </span>
                            <span class="d-flex justify-content-between">
                                <span>Phone: </span>
                                <input type="text" name="phone" value="{{Auth::user()->phone}}" style="border:none; text-align:right; outline:none">
                            </span>
                        </div>
                        <div>
                            <p class="mt-4 fs-5">Payment options</p>
                            <button type="submit" style="background-color: #fff; border:0.7px solid #d1d1d1; color: #454545" class="w-100 px-3 py-3">
                                COD (Cash on Delivery)
                            </button>
                            <button style="background-color: #000; border:none; color: white" class="w-100 px-3 py-3 mt-2">
                                <a target="_blank" href="{{url('stripe', $value)}}">
                                    PAY WITH CARD
                                </a>   
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
    <!-- footer -->
    @include('home.footer')
</body>
</html>