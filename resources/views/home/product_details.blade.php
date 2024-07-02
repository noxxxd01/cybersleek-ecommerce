<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
    
</head>
<body>
    <!-- navigation -->
    @include('home.navigation')
    <!-- /navigation -->

    <div class="page-bread">
        <img class="breadcrumb" src="{{asset('images/breadcrumb.jpg')}}" alt="">
        <section class="d-flex justify-content-center">
            <div class="text-light mt-5 d-flex gap-4 align-items-center inside-bread">
                <span>Home</span>
                <i class="fa fa-chevron-right" aria-hidden="true"></i>
                <span class="fw-bold">{{$data->name}}</span>
            </div>
        </section>
    </div>

    <section class="py-5">
        <div class="row mx-auto">
            <div class="col text-center">
                <img src="/products/{{$data->image}}" alt="" style="width:30rem; height:30rem;">
            </div>
            <div class="col">
                <div>
                    <h1 class="fs-1 fw-normal">{{$data->name}}</h1>
                    <div class="d-flex align-items-center gap-3">
                        <span class="fs-2 fw-bold" style="color: #ff0000">₱{{$data->price}}</span>
                        <span class="fs-5 text-decoration-line-through" style="color:#b0b0b0">₱6000</span>
                    </div>
                    <div class="desc my-5" style="font-size:0.95rem; color:#4f4f4f">
                        <p>
                            {{$data->description}}
                        </p>
                    </div>
                    <div>
                        <a href="" style="background-color: #000000; color:#fff; font-size:0.7rem; padding: 5px 10px; font-weight:600">
                            {{$data->category}}
                        </a>    
                        <div class="mt-4 d-flex align-items-center gap-4">
                            <a href="{{url('add_cart', $data->id)}}" class="addToCart d-flex align-items-center gap-3">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                ADD TO CART
                            </a>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p style="font-size:1rem; font-weight: 600; color: #4f4f4f">Availability: <span style="color:#00e606"> {{$data->quantity}}</span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
</html>