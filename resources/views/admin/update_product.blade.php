<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.links')
</head>

<body>

  <!-- ======= Header ======= -->
  @include('admin.header')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('admin.sidebar')
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Product Editor</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
          <li class="breadcrumb-item active">Product Editor</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Update a product</h5>

              <!-- Floating Labels Form -->
              <form class="row g-3" action="{{url('edit_product', $data->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                  <div class="form-floating">
                    <input name="name" value="{{$data->name}}" type="text" class="form-control" id="productName" placeholder="Product name">
                    <label for="productName">Product name</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input name="price" value="{{$data->price}}" type="number" class="form-control" id="productPrice" placeholder="Product price">
                    <label for="productPrice">Product price</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating">
                    <textarea name="description" class="form-control" placeholder="Description" id="floatingTextarea" style="height: 100px;">{{$data->description}}</textarea>
                    <label for="floatingTextarea">Description</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="col-md-12">
                    <div class="input-group">
                        <img src="/products/{{$data->image}}" alt="" style="width:7rem; height:7rem">
                    </div>
                    <div class="input-group">
                        <input name="image" type="file" class="form-control py-3" id="inputGroupFile02">
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating mb-3">
                    <select name="category" class="form-select" id="floatingSelect" aria-label="State">
                        <option value="{{$data->category}}">{{$data->category}}</option>
                        @foreach($category as $category)
                        <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                    <label for="floatingSelect">Category</label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-floating">
                    <input name="qty" value="{{$data->quantity}}" type="text" class="form-control" id="floatingQty" placeholder="Qty">
                    <label for="floatingQty">Qty</label>
                  </div>
                </div>
                <div class="text-left">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End floating Labels Form -->

            </div>
        </div>

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('admin.footer')
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @include('admin.scripts')

</body>

</html>