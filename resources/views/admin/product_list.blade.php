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
      <h1>Product List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
          <li class="breadcrumb-item active">Product List</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Datatables</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>Procut image</th>
                    <th>Procut name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($product as $prodcts)
                    <tr>
                        <td>
                            <img src="products/{{$prodcts->image}}" alt="" style="width: 4rem; height: 4rem">
                        </td>
                        <td>{{$prodcts->name}}</td>
                        <td>{{$prodcts->category}}</td>
                        <td>{{$prodcts->price}}</td>
                        <td>{{$prodcts->quantity}}</td>
                        <td>
                            <a href="{{url('update_product', $prodcts->id)}}" class="btn btn-light"><i class="ri-edit-line"></i></a>
                            <a href="{{url('delete_product', $prodcts->id)}}" class="btn btn-danger"><i class="ri-delete-bin-line"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
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