@extends('front.layouts.master')
@section('title',  $category->name)


@section('content')


      <div class="col-md-9 mx-auto">
        <?php foreach ($posts as $post): ?>
        <div class="post-preview">
          <a href="{{route('single',[$post->getCategory->slug,$post->slug])}}">
            <h2 class="post-title">
              {{$post->title}}
            </h2>
            <img src="{{asset($post->image)}}" widht="800" height="400"/>
            <h3 class="post-subtitle">
              {!!str_limit($post->content,125)!!}
            </h3>
          </a>
          <p class="post-meta">
            {{$post->getCategory->name}} <span class="float-right">{{$post->created_at->diffForHumans()}}</span></p>
        </div>
        <hr>
        <?php endforeach; ?>
        {{$posts->links('pagination::bootstrap-4')}}


      </div>
@include('front.widgets.categoryWidget')
@endsection
