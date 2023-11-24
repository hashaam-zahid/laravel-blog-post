@extends('layouts.app')
@section('title','Welcome To Laravel blog')
@section('content')
 <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      @if(count($posts) > 0)
      @foreach($posts as $post)
        <div class="post-preview">
          <a href="{{ route('post.show',$post->id)}}">
            <h2 class="post-title">
             <img src="{{ url('storage/post_photo/'.$post->photo) }} ">
             {{ $post->title }}
            </h2>
            <p class="post-subtitle">
               {{$post->content}} 
            </p>
          </a>
          <p class="post-meta">Posted by
            <a href="#">{{$post->users->name}}</a>
            on {{$post->created_at->diffForHumans() }}</p>
        </div>
        @endforeach
        @else
        <div class="alert alert-primary">{{ 'No Post Yet Made '}} 
        
  
    </div>
        @endif
        <hr>
        <!-- Pager -->
        <div class="clearfix">
          <!-- {{$posts->links()}} --> 
        </div>
        @if(Auth::check())
        <button class="btn btn-success" class="btn-make-post" onClick="window.location.href='{{route('post.create')}}'">Make Post</button>
              @endif 
      </div>
    </div>
  </div>

  <hr>
@endsection