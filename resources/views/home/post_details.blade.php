<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
    @include('home.homecss')
    <style type="text/css">

h3{
    text-align: center;
    color: white;
    font-size: 30px;
    font-weight: bold;
    padding: 30px;
}
.div_design{
    text-align: center;
    margin: 60px;
    color: white;
}
p{
    color: white;
}

    </style>
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
        @include('home.header')



        <div style="margin: 60px ; text-align :center" class="col-md-12" class="div_design">
            <h3 ><b>{{$post->title}}</b></h3>
            <div><img src="{{ asset('postImage/' . $post->image) }}" ></div>
            <p>{{$post->description}}</p>
            <h4>Post by <b style="color: red">{{$post->name}}</b></h4>
            <p>Posted At <b>{{$post->created_at}}</b></p>
         </div>


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





