<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
    @include('home.homecss')
    <style type="text/css">

        .title_design{
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
            color: white;
        }
        td{
            color: white;
        }



    </style>
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
        @include('home.header')
        @include('sweetalert::alert')
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


        <h1 class="title_design">Add Post</h1>
        <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
              <tr>
                <th>Post Title</th>
                <th>Post Description</th>
                <th>Post Image</th>
                <th>Posted By</th>
                <th>Post Status</th>
                <th>User Type</th>
                <th>Created At</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($posts as $post)
                <tr>
                  <td>{{ $post->title }}</td>
                  <td>{{ $post->description }}</td>
                  <td><img src="{{ asset('postImage/' . $post->image) }}" style="width: 100px; height: 100px;"></td>
                  <td>{{ $post->name }}</td>
                  <td>{{ $post->post_status }}</td>
                  <td>{{ $post->usertype }}</td>
                  <td>{{ $post->created_at }}</td>
                  <td>
                      <a href="{{ route('edit_user_post', $post->id) }}" class="btn btn-success">Edit</a>
                    <form id="deleteForm_{{ $post->id }}" action="{{ route('delete_user_post', $post->id) }}" method="POST" style="display: inline;">
                      @csrf
                      @method('DELETE')
                      <button type="button" class="btn btn-danger" onclick="confirmation('deleteForm_{{ $post->id }}')">Delete</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>




      <!-- footer section start -->
        @include('home.footer')

      <!-- footer section end -->
      <!-- copyright section start -->
        @include('home.copyright')
      <!-- copyright section end -->
      <!-- Javascript files-->
        @include('home.js')
        <script>
            function confirmation(formId) {
              swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this post!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
                  document.getElementById(formId).submit(); // Submit the form if the user confirms
                }
              });
            }
          </script>
   </body>
</html>
