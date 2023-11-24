<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Http\Resources\PostResource as PostResource;
use App\Policies\PostPolicy;
use App\Post;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Carbon;
use App\Jobs\PostJob;
use App\Http\Requests\PostStore;

//use App\Http\Requests\PostStore;
class PostController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function __construct()
{
$this->middleware('auth',['except'=>['index','show']]);
}
public function index()
{
//
$posts=Post::with('users')->paginate(2);
//dd($posts);
return view('welcome')->with('posts',$posts);
}

/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
//
return view('posts.create');
}

/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(PostStore $request)
{
//
$post=new Post;
$post->user_id=Auth::user()->id;
$post->title=$request->title;
$post->content=$request->content;



// Handle File Upload
if($request->hasFile('photo')){
// Get filename with the extension
$filenameWithExt = $request->file('photo')->getClientOriginalName();
// Get just filename
$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
// Get just ext
$extension = $request->file('photo')->getClientOriginalExtension();
// Filename to store
$fileNameToStore= $filename.'_'.time().'.'.$extension;
// Upload Image
$path = $request->file('photo')->storeAs('public/post_photo', $fileNameToStore);

// make thumbnails
$thumbStore = 'thumb.'.$filename.'_'.time().'.'.$extension;
$thumb = Image::make($request->file('photo')->getRealPath());
$thumb->resize(80, 80);
$thumb->save('storage/post_photo/thumbnail/'.$thumbStore);

} else {
$fileNameToStore = 'noimage.jpg';
}
$post->photo=$fileNameToStore;
if($post->save()):
$data=array(
'message'=>'Your Awsome Post Successfully Posted :) ',
'alert'=>'alert alert-success');
Session::put($data);

$job=(new PostJob()) 
      ->delay(Carbon\Carbon::now()->addSeconds(10));
      dispatch($job);

return redirect('/my-posts');
else:
$data=array(
'message'=>'Something Went Wrong While Posting Your Post. Try Later!',
'alert'=>'alert alert-danger');

Session::put($data);
return redirect()->back();
endif;

}

/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{
//    
$post=Post::with('users')->findOrFail($id);
// unable authorize validation for show only owner posts
//     $this->authorize('update',$post);
return view('posts.show',compact('post'));
}
public function myPosts()
{
$posts=Post::where('user_id',Auth::user()->id)->paginate(2);
return view('posts.my-posts',compact('posts'));
}

/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{
//
$post=Post::findOrFail($id);
return view('posts.edit',compact('post'));
}

/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function update(PostStore $request, $id)
{
//

$post=Post::with('users')->findOrfail($id);
$post->user_id=$post->user_id;
$post->title=$request->title;
$post->content=$request->content;
// Handle File Upload
if($request->hasFile('photo')){
// Get filename with the extension
$filenameWithExt = $request->file('photo')->getClientOriginalName();
// Get just filename
$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
// Get just ext
$extension = $request->file('photo')->getClientOriginalExtension();
// Filename to store
$fileNameToStore= $filename.'_'.time().'.'.$extension;
// Upload Image
$path = $request->file('photo')->storeAs('public/post_photo', $fileNameToStore);

// make thumbnails
$thumbStore = 'thumb.'.$filename.'_'.time().'.'.$extension;
$thumb = Image::make($request->file('photo')->getRealPath());
$thumb->resize(80, 80);
$thumb->save('storage/post_photo/thumbnail/'.$thumbStore);

} 
else {

if($post->photo):

$fileNameToStore=$post->photo;

else:
$fileNameToStore = 'noimage.jpg';
endif;
}

$post->photo=$fileNameToStore;
if($post->update()):
$data=array(
'message'=>'Your Awsome Post Updated Successfully :) ',
'alert'=>'alert alert-success');
Session::put($data);
return redirect('/my-posts');
else:
$data=array(
'message'=>'Something Went Wrong While Updating Posting Your Post. Try Later!',
'alert'=>'alert alert-danger');

Session::put($data);
return redirect()->back();
endif;
}

/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
//
$post=Post::findOrFail($id);
$post->delete();
$data=array(
'message'=>'Post Delete Successfully',
'alert'=>'alert alert-danger');
Session::put($data);
return redirect()->back();
}
public function getPostReources()
{
    $posts=Post::with('users')->get();
    return PostResource::collection($posts);
}
}