<!-- Header -->
@include('templates.header')
<!-- End of Header -->
<!-- Page Wrapper -->
<div id="wrapper">
  <!-- Sidebar -->
  @include('templates.sidebar')
  <!-- End of Sidebar -->
  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
      <!-- Navbar -->
      @include('templates.navbar')
      <!-- End of Navbar -->
      <!-- Begin Page Content -->
      <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">@yield('heading')</h1>
        <!-- End of Page Heading -->
        <!-- Alert -->
        @if (count($errors)>0)
          @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
              {{ $error }}
            </div>
          @endforeach
        @elseif (Session::has('success'))
          <div class="alert alert-success" role="alert">
            {{ Session('success') }}
          </div>
        @endif
        <!-- End of Alert -->
        <!-- Content -->
        @yield('content')
        <!-- End of Content -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
    <!-- Footer -->
    @include('templates.footer')
    <!-- End of Footer -->
  </div>
  <!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
<!-- Modal-->
@yield('modal')
<!-- End of Modal -->
<!-- Script-->
@include('templates.script')
<!-- End of Script -->