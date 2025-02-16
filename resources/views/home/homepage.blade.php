<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
    @include('home.homecss')
   </head>
   <body>
        @include('sweetalert::alert')
      <!-- header section start -->
      <div class="header_section">
        @include('home.header')
         <!-- banner section start -->

           @include('home.banner')
         <!-- banner section end -->
      </div>
      <!-- header section end -->
      <!-- services section start -->
      @include('home.service')
      <!-- services section end -->
      <!-- about section start -->
     @include('home.aboutus')
      <!-- about section end -->
      <!-- blog section start -->
     @include('home.blog')
      <!-- blog section end -->
      <!-- client section start -->
      @include('home.client')

      <!-- client section start -->
      <!-- choose section start -->
        @include('home.choose')
      <!-- choose section end -->
      <!-- footer section start -->
        @include('home.footer')

      <!-- footer section end -->
      <!-- copyright section start -->
        @include('home.copyright')
      <!-- copyright section end -->
      <!-- Javascript files-->
        @include('home.js')
   </body>
</html>
