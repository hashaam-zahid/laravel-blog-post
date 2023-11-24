<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PageController extends Controller
{
    public function about()
    {
    	return view('pages.about');
    }
    public function index()
    {
    $posts=\App\Post::with('users')->paginate(2);
       //dd($posts);
    return view('welcome')->with('posts',$posts);
    }
    public function contact()
    {
    	return view('pages.contact');
    }
}
