<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::id()){
            $posts = Post::where('post_status','active')->paginate(10);
            $usertype = Auth::user()->usertype;
            if($usertype == 'user'){
                return view('home.homepage',compact('posts'));
            }
            else if($usertype =='admin'){
                return view('admin.index');
            }
            else{
                return redirect()->back();
            }


        }



    }
    public function homepage()
    {
        $posts = Post::where('post_status','active')->paginate(10);
        return view('home.homepage',compact('posts'));
    }
    public function postDetails($id){
        $post = Post::findOrfail($id);
        return view('home.post_details',compact('post'));
    }
    public function createPost(){
        return view('home.create_post');
    }
    public function storePost(Request $request){
        $user = Auth::user();
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $image = $request->file('image');
        if($image){
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $request->image->move(public_path('postImage'),$imageName);
            $post->image = $imageName;




        }
        $post->post_status = 'pending';
        $post->user_id = $user->id;
        $post->usertype = $user->usertype;
        $post->name = $user->name;





        $post->save();
        Alert::success('Success', 'Post Created Successfully');
        return redirect()->route('home');


    }
    public function userPostList(){
        $user = Auth::user();
        $posts = Post::where('user_id',$user->id)->get();
        return view('home.userPosts',compact('posts'));
    }
    public function editPost($id){
        $post = Post::findOrfail($id);
        return view('home.editPost',compact('post'));
    }
    public function updatePost(Request $request,$id){
        $post = Post::findOrfail($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $image = $request->file('image');
        if($image){
            // Remove old image if exists
            if($post->image && file_exists(public_path('postImage/'.$post->image))){
            unlink(public_path('postImage/'.$post->image));
            }
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $request->image->move(public_path('postImage'),$imageName);
            $post->image = $imageName;
        }
        $post->save();
        Alert::success('Success', 'Post Updated Successfully');
        return redirect()->route('user_posts');
    }
    public function deletePost($id){
        $post = Post::findOrfail($id);
        if($post->image && file_exists(public_path('postImage/'.$post->image))){
            unlink(public_path('postImage/'.$post->image));
        }
        $post->delete();
        Alert::success('Success', 'Post Deleted Successfully');
        return redirect()->route('user_posts');
    }


}
