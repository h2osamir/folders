@extends('master')

@section('content')


<div class="row">
    <div class="col-md-12 text-right">
   <a href="{{ url('/blog') }}"> return back</a>
    </div>

</div>


<div class="row">
    <div class="col-md-12 text-right">
    <h1>{{ $post->title}}</h1>
   <img src="{{asset('storage/'.$post->image)}}" alt="{{ $post->title}}">    </div>
    <p>{{!! $post->body !!}}
    </p>
</div>
@endsection 