<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')
  </head>
  <body>
    <! --- Header->
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
        @include('admin.sidebar')

      <!-- Sidebar Navigation end-->
        @include('admin.pagecontent')
        @include('admin.footer')
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>
