<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
    @include('home.homecss')
    <style type="text/css">
        .div_design{
            text-align: center;

        }
        .title_design{
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
            color: white;
        }
        label{
            display: inline-block;
            width: 200px;
            color: white;
            font-size: 18px;
            font-weight: bold;

        }
        .field_design{
            padding: 25px;
        }


    </style>
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
        @include('home.header')



      <div class="div_design">
        <h1 class="title_design">Edit Post</h1>
        <form action="{{ route('update_user_post', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="field_design" >
                <label for="title">Post Title</label>
                <input type="text" name="title" value="{{$post->title}}" >
            </div>
            <div class="field_design">
                <label for="description" style="vertical-align: center;">Post Description</label>
                <textarea name="description" cols="50" rows="5" style="display: inline-block; vertical-align: top;">{{$post->description}}</textarea>
            </div>
            <div class="field_design">
                <label for="image">Add Image</label>
                <input type="file" name="image" id="image" >
                <img src="{{ asset('postImage/' . $post->image) }}" style="width: 100px; height: 100px;">

            </div>
            <div class="field_design" >
                <input type="submit" class="btn btn-primary" value="Edit Post" >
            </div>




        </form>
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
