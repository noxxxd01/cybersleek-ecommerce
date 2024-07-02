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
      <h1>Order Lists</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
          <li class="breadcrumb-item active">Order Lists</li>
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
                    <th>User details</th>
                    <th>Procut image</th>
                    <th>Procut name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Payment Method</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($data as $data)
                    <tr>
                        <td>
                            <span>{{$data->name}}</span>
                            <p style="font-size:0.9rem; color:#5d5d5d">{{$data->phone}}</p>
                        </td>
                        <td>
                            <img src="products/{{$data->product->image}}" alt="" style="width: 4rem; height: 4rem">
                        </td>
                        <td>{{$data->product->name}}</td>
                        <td>{{$data->product->category}}</td>
                        <td>{{$data->product->price}}</td>
                        <td style="font-size:0.9rem; color:#6d6d6d">{{$data->payment_status}}</td>
                        <td>   
                            @if($data->status == 'In Progress')
                            <span class="badge rounded-pill bg-secondary">
                                {{$data->status}}
                            </span>
                            @elseif($data->status == 'In Transit')
                            <span class="badge rounded-pill bg-primary">
                                {{$data->status}}
                            </span>
                            @elseif($data->status == 'Delivered')
                            <span class="badge rounded-pill bg-success">
                                {{$data->status}}
                            </span>
                            @endif
                        </td>
                        <td>
                            <div class="nav-item dropdown pe-3">
                                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                                    <span class="d-none d-md-block dropdown-toggle ps-2">
                                    </span>
                                </a><!-- End Profile Iamge Icon -->

                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                                    <li class="py-3 px-3">
                                        <a href="{{url('in_transit', $data->id)}}" class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                            <i class="ri-truck-line"></i> In Transit
                                        </a>
                                    </li>
                                    <li class="py-3 px-3">
                                        <a href="{{url('delivered', $data->id)}}" class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                            <i class="ri-folder-received-line"></i> Delivered
                                        </a>
                                    </li>
                                    <li class="py-3 px-3">
                                        <a href="{{url('invoice', $data->id)}}" class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                            <i class="ri-file-pdf-line"></i> Print PDF
                                        </a>
                                    </li>
                                </ul>
                            </div>
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