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
      <h1>Catogories</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
          <li class="breadcrumb-item active">Catogories</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">
            
            <!-- Category -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="card-body pb-0">
                  <h5 class="card-title">Catogories </span></h5>

                  <table class="table table-borderless">
                    <thead>
                      <t class="row">
                        <th scope="col" class="col-10">Category Name</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      @foreach($data as $data)
                      <tr>
                        <td><a href="#" class="text-primary fw-bold">{{$data->category_name}}</a></td>
                        <td>
                            <a href="{{url('delete_category', $data->id)}}" class="btn btn-danger"><i class="ri-delete-bin-line"></i></a>
                        </td>
                      </tr>
                      @endforeach

                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Category -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Activity -->
          <div class="card">

            <div class="card-body">
              <h5 class="card-title">Add Category</h5>
              <div class="activity">
                <form action="{{url('add_category')}}" method="post">
                    @csrf
                    <input name="category" type="text" class="form-control mb-3" id="inputNanme4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>

            </div>
          </div><!-- End Recent Activity -->

        </div><!-- End Right side columns -->

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