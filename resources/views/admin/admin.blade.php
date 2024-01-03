
<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <title>@yield('title')</title>
  </head>
  <body>
    <div class="container-scroller">
     
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            @yield('content')
         </div>   
        <!-- partial -->
        @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
