@extends('front.layouts.master')
@section('title','  Yogingeneer')
@section('subtitle','  Data Scientist, Yoga Enthusiast')


@section('content')


      <div class="col-md-9 mx-auto">
        <h1 align="center">Blog Posts</h1>
        <hr>
        <hr>
            <?php foreach ($posts as $post): ?>

            <div class="post-preview">
              <a href="{{route('single',[$post->getCategory->slug,$post->slug])}}">
                <h2 class="post-title">
                  {{$post->title}}
                </h2>
                <img class="img-fluid" src="{{$post->image}}" widht="800" height="400"/>
                <h3 class="post-subtitle">
                  {!!str_limit($post->content,125)!!}
                </h3>
              </a>
              <p class="post-meta">
              {{$post->getCategory->name}}<span class="float-right">{{$post->created_at->diffForHumans()}}</span></p>
            </div>
            <hr>
            <?php endforeach; ?>

            <h1 align="center">Projects</h1>
            <hr>
            <hr>
                <?php foreach ($projects as $project): ?>

                <div class="post-preview">
                  <a href="{{route('project',$project->slug)}}">
                    <h2 class="post-title">
                      {{$project->title}}
                    </h2>
                    <img class="img-fluid"  src="{{$project->image}}" widht="800" height="400"/>
                    <h3 class="post-subtitle">
                      {!!str_limit($project->content,125)!!}
                    </h3>
                  </a>
                  <p class="post-meta">
                    Pelinsu Çelebi <span class="float-right">{{$project->created_at->diffForHumans()}}</span></p>
                </div>
                <hr>
                <?php endforeach; ?>



      </div>
@include('front.widgets.categoryWidget')
@endsection
