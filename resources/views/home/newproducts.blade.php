<section class="pb-5">
    <h1 class="fs-6 fw-bold mb-5">NEW PRODUCTS</h1>
    <div class="container-fluid">
        <div class="row product gap-1">

            @foreach($product->slice(0, 8) as $product)
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