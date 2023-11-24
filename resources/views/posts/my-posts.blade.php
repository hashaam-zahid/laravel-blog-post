@extends('layouts.app')
@section('title','Your all Posts')
@section('content')
 <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        @if(Auth::check())
        <button class="btn btn-success" class="btn-make-post" onClick="window.location.href='{{route('post.create')}}'">Make Post</button>
              @endif 
      @if(count($posts) > 0)
      @foreach($posts as $post)
        <div class="post-preview">
          <a href="{{ route('post.show',$post->id)}}">
            <h2 class="post-title">
             <img src="{{ url('storage/post_photo/thumbnail/thumb.'.$post->photo) }} ">
             {{ $post->title }} 
                <form action="{{route('post.destroy',$post->id)}}" method="post">
                  @csrf
                  @method('delete')
                  
             <button type="submit" class="btn btn-danger">Delete Post</button>
            </h2>
          </form>
           <a href="{{route('post.edit',$post->id)}}" class="btn btn-warning">Edit Post</a>
            <p class="post-subtitle">
              {!! \Illuminate\Support\Str::words($post->content,10) !!}
              </p>
          </a>
          <p class="post-meta">Posted by
            <a href="#">{{$post->users->name}}</a>
            Created on {{$post->created_at->diffForHumans() }} 
            @if($post->updated_at)
            update on {{$post->updated_at->diffForHumans() }}
            @endif
          </p>
        </div>
        @endforeach
        @else
        <div class="alert alert-primary">{{ 'No Post Yet Made '}} 
        
  
    </div>
        @endif
        <hr>
        <!-- Pager -->
        <div class="clearfix">
           {{$posts->links()}}
        </div>
        
      </div>
    </div>
  </div>

  <hr>
@endsection