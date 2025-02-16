<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')
    <style type="text/css">
        .post_title{
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
            color: white;
        }
        .div_center{
            text-align: center;
            padding: 30px;
        }
        label{
            display: inline-block;
            width: 200px;
        }

    </style>
  </head>
  <body>
    <! --- Header->
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
        @include('admin.sidebar')

      <!-- Sidebar Navigation end-->
       <div class="page-content">
        @if (session()->has('message'))
            <div class="alert alert-success" style="text-align: center; width: 100%;">{{session()->get('message')}}</div>


        @endif
        <h1 class="post_title">Add Post</h1>

        <div>
            <form action="{{route('add_post')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="div_center">
                <label for="title">Post Title</label>
                <input type="text" name="title" style="width: 300px; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
            </div>
            <div class="div_center">
                <label for="description" style="display: block; text-align: center;">Post Description</label>
                <textarea name="description" cols="30" rows="10" style="width: 300px; padding: 10px; border-radius: 5px; border: 1px solid #ccc;"></textarea>
            </div>
            <div class="div_center">
                <label for="image">Add Image</label>
                <input type="file" name="image" id="image" style="width: 300px; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
            </div>
            <div class="div_center">
                <input type="submit" class="btn btn-primary" style="width: 150px; padding: 10px; border-radius: 5px;">
            </div>
            </form>
        </div>

       </div>
        @include('admin.footer')
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>
