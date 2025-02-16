<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
 public function postPage(){
    return view ('admin.post_page');

 }
 public function addPost(Request $request){
    $post = new Post();
    $post->title = $request->title;
    $post->description = $request->description;
    $post->post_status = 'active';
    ////
    $image = $request->image;
    if($image){
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move('postImage',$imageName);
        $post->image = $imageName;
    }

    ////
    $post->name = Auth::user()->name;
    $post->user_id = Auth::user()->id;
    $post->usertype = Auth::user()->usertype;
    $post->save();
    return redirect()->back()->with('message','Post Added Successfully');


 }
    public function postList(){
        $posts = Post::paginate(10);
        return view('admin.post_list',compact('posts'));
    }
    public function deletePost($id){
        $post = Post::findOrfail($id);
        if ($post->image && file_exists(public_path('postImage/'.$post->image))) {
            unlink(public_path('postImage/'.$post->image));
        }
        $post->delete();
        return redirect()->back()->with('message','Post Deleted Successfully');
    }
    public function editPost($id){
        $post = Post::findOrfail($id);
        return view('admin.edit_post',compact('post'));


    }
    public function updatePost(Request $request ,$id){
        $data = Post::findOrfail($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $image = $request->image;
        if($image){
            // Delete old image if it exists
            if ($data->image && file_exists(public_path('postImage/'.$data->image))) {
            unlink(public_path('postImage/'.$data->image));
            }
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move('postImage',$imageName);
            $data->image = $imageName;
        }

        $data->save();
        return redirect()->route('post_list')->with('message','Post Updated Successfully');





    }
    public function acceptPost($id){
        $post = Post::findOrfail($id);
        $post->post_status = 'active';
        $post->save();
        return redirect()->back()->with('message','Post Accepted Successfully');
    }
    public function rejectPost($id){
        $post = Post::findOrfail($id);
        $post->post_status = 'rejected';
        $post->save();
        return redirect()->back()->with('message','Post Rejected Successfully');
    }



}
