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
                <span class="fw-bold">Shop</span>
            </div>
        </section>
    </div>
    <section class="py-5">
    <h1 class="fs-6 fw-bold mb-5">PRODUCTS</h1>
    <div class="container-fluid">
        <div class="row product gap-1">

            @foreach($product as $product)
            <div class="col p-0 product-item py-4">
                <div class="text-center mb-3">
                    <img src="products/{{$product->image}}" alt="">
                </div>
                <div class="px-3">
                    <p class="m-0 fw-bold mb-2">{{$product->name}}</p>
                    <div class="d-flex align-items-center gap-2">
                        <h2 style="font-size: 1.3rem; font-weight:600; color: #ff0000">₱{{$product->price}}</h2>
                        <span class="text-decoration-line-through">₱4000</span>
                    </div>
                    <div class="mt-3">
                        <a class="btn btn-dark" href="{{url('add_cart', $product->id)}}">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        </a>
                        <a class="btn btn-outline-secondary" href="{{url('product_details', $product->id)}}">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

<!-- footer -->
@include('home.footer')

</body>
</html>