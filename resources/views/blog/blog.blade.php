@extends('master')

@section('content')


<div class="row">
    <div class="col-md-8">
    <H1>BLOG</H1>
@foreach ($myPosts as $post)
           <div class="card text-center">
           <a href="{{ url('/post/'.$post->slug)}}">
      <img class="card-img-top" src="{{ asset('/storage/'.$post->image)}}" alt="{{$post->title}}">
      </a>
             <div class="card-body">
        <h4 class="card-title"> <a href="{{ url('/post/'.$post->slug)}}">
        {{$post->title}} </a></h4>
        <p class="card-text">{{ str_limit($post->excerpt, 100)}}</p>
        <a href="{{ url('/blog/'.$post->category_id) }}">
        <span class="badge badge-primary">
        {{$post->category->name}}
        
        </span>
        </a>
              </div>
            </div>
@endforeach
    </div>

    <div class="col-md-4">
    <H1>list of Categories</H1>
    <ul class="list-group">
    <li   class="list-group-item @if(!$id) active @endif   ">
    <a class="list-group-item-action" href="{{url('/blog') }}">ALL</a></li>
    @foreach($myCategories as $category)

    <li class="list-group-item d-flex justify-content-between align-items-center
    @if($category->id == $id) active @endif 
    ">
    <a class="list-group-item-action"  href="{{ url('/blog/'.$category->id) }}">
      {{ $category->name }}
      </a>
    <span class="badge badge-primary badge-pill">{{ $category->posts->count()}}</span>
  </li>




      
    @endforeach
    </ul>
   
    </div>

    <div class="row">
    <div class="pagination">
   {{ $myPosts->links() }}
    </div> </div>
    
</div>
@endsection 

