<?php foreach ($posts as $post): ?>
<div class="post-preview">
  <a href="{{route('single',[$post->getCategory->slug,$post->slug])}}">
    <h2 class="post-title">
      {{$post->title}}
    </h2>
    <img src="{{$post->image}}"/>
    <h3 class="post-subtitle">
      {{str_limit($post->content,125)}}
    </h3>
  </a>
  <p class="post-meta">
    <a href="#">Category: {{$post->getCategory->name}}</a><span class="float-right">{{$post->created_at->diffForHumans()}}</span></p>
</div>
<hr>
<?php endforeach; ?>
{{$posts->links('pagination::bootstrap-4')}}
