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
                <span class="fw-bold">Orders</span>
            </div>
        </section>
    </div>

    <div style="background-color: #e7e7e7; height:100vh">
        <section class="py-5">
            <div class="d-flex mx-auto gap-3">
                <div class="d-flex flex-grow-1 flex-column">
                    @foreach($order as $order)
                    <div class="flex-shrink-1 bg-light p-3 mb-2">
                        <div class="row">
                            <div class="col-1">
                                <img src="products/{{$order->product->image}}" alt="" style="width:6rem; height:6rem">
                            </div>
                            <div class="col-md-9">
                                <p class="fs-5 mb-0">{{$order->product->name}}</p>
                                <p style="font-size:0.9rem; color: #5d5d5d">Category: <span>{{$order->product->category}}</span></p>
                                <div class="d-flex gap-4 align-items-center">
                                    <span class="fs-6 fw-bold">₱{{$order->product->price}}</span>
                                </div>
                            </div>
                            <div class="col-md-2 text-center my-auto">
                                <span class="rounded-pill text-light fw-bold" style="padding: 2px 1rem; font-size:0.9rem; background-color:#000">
                                    {{$order->status}}
                                </span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
        
            </div>
        </section>
    </div>
    <!-- footer -->
    @include('home.footer')
</body>
</html>