@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>

                    @endif

                    {{Auth::user()->name}} You are logged in! Now You can @if(Auth::check())
        <button class="btn btn-success" class="btn-make-post" onClick="window.location.href='{{route('post.create')}}'">Make Post</button>
              @endif 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
