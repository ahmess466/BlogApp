<!DOCTYPE html>
<html>
  <head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @include('admin.css')
    <style type="text/css">
        .post_title {
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
            color: white;
        }
        .table_deg {
            border: 1px solid white;
            width: 80%;
            text-align: center;
            margin-left: 70px;
        }
        .th_deg {
            background-color: skyblue;
        }
    </style>
  </head>
  <body>
    <! --- Header -->
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation -->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end -->
      <div class="page-content">
        @if (session()->has('message'))
          <div class="alert alert-success" style="text-align: center; width: 100%;">{{ session()->get('message') }}</div>
        @endif
        <h1 class="post_title">All Posts</h1>
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

              <th>Status Accept</th>
              <th>Status Reject</th>
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
                    <a href="{{ route('edit_post', $post->id) }}" class="btn btn-success">Edit</a>
                  <form id="deleteForm_{{ $post->id }}" action="{{ route('delete_post', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger" onclick="confirmation('deleteForm_{{ $post->id }}')">Delete</button>
                  </form>
                </td>
                @if($post->post_status != 'active')
                    <td><a href="{{route('accept_post',$post->id)}}" class="btn btn-outline-secondary">Accept</a></td>
                @else
                    <td><span class="badge badge-success">Accepted</span></td>
                @endif
                @if($post->post_status != 'rejected')
                    <td><a href="{{route('reject_post',$post->id)}}" class="btn btn-outline-secondary">Reject</a></td>
                @else
                    <td><span class="badge badge-danger">Rejected</span></td>
                @endif
              </tr>
            @endforeach
          </tbody>
        </table>
        {{ $posts->links('pagination::bootstrap-5') }}
      </div>
      @include('admin.footer')
    </div>
    <!-- JavaScript files -->
    @include('admin.js')

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
