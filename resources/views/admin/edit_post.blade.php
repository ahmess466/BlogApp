<!DOCTYPE html>
<html>
  <head>
    <style type="text/css">
        .post_title {
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
            color: white;
        }

    </style>
    @include('admin.css')
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
            <h1 class="post_title">Edit Post</h1>
            <div class="container">
                <form action="{{ route('update_post', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Post Title:</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
                        <label for="title">Description:</label>
                        <textarea class="form-control" id="description" name="description" rows="4">{{ $post->description }}</textarea>
                        <label for="image">Post Image:</label>
                        <input type="file" class="form-control" id="image" name="image">
                        <img src="{{ asset('postImage/' . $post->image) }}" style="width: 100px; height: 100px;">

                        <button type="submit" class="btn btn-primary">Update Post</button>

                    </div>



      </div>
        @include('admin.footer')
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>
