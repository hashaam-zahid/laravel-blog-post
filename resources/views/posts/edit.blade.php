@extends('layouts.app')
@section('title',$post->title)
@section('content')

 <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>Edit Post</p>
       
        <form action="{{ action('PostController@update',$post->id) }}" method="post" name="frmPost" id="frmPost" enctype= multipart/form-data novalidate>
         @csrf
         @method('PUT')

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Title</label>
              <input type="text" name="title" class="form-control" placeholder="Please Enter Post Title" value="{{$post->title}}" id="title" required data-validation-required-message="Please enter Post Title.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Content</label>
              <textarea rows="5" cols="5"  class="form-control" placeholder="Your Post Content" id="content" name="content" required data-validation-required-message="Please enter your Post title">{{$post->title}}</textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Post Photo</label>
              <img src="{{url('storage/post_photo/thumbnail/thumb.'.$post->photo)}}">
             <input type="file" class="form-control" placeholder="Your Post Photo" id="photo" name="photo" required data-validation-required-message="Please Upload Post Photo.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          
          <br>
          <div id="success"></div>
          <button type="submit" class="btn btn-warning" id="submitPostFrm">Update Post</button>
        </form>
      </div>
    </div>
  </div>
@endsection