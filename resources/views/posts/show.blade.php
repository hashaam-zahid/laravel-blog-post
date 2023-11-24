@extends('layouts.app')
@section('title','Your Posts')
@section('content')
<!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        	@if($post)
          <h2 class="section-heading">{{$post->title}}</h2>         
          <a href="#">
            <img class="img-fluid" src="{{url('storage/post_photo/'.$post->photo)}}" alt="{{$post->tilte}}">
          </a>
              <p>{{ $post->content}}</p>
          @else
          <div class="alert alert-danger">{{'Something Went Wrong Post Dose Not Ext'}}</div>

          @endif
        </div>
      </div>
      <div id="disqus_thread"></div>
    </div>
  </article>



  <hr>

@endsection