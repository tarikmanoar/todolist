@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($userPosts as $post)
        <div class="col-lg-4 mt-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}} </h5>
                    <a href="">{{$post->user->name}} </a> &nbsp;&nbsp;
                    <span>
                        {{$post->created_at->format('D-m-Y')}}
                            &nbsp;
                        {{$post->created_at->format('H:i:s A')}}
                    </span>
                    <img src="{{$post->thumbnail}} " alt="img" class=" img-fluid ">
                    <p class="card-text">{{$post->content}} </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection