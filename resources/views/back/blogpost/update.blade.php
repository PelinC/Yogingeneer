@extends('back.layouts.master')
@section('content')
<div class="card shadow mb-4">
  <div class="card-header py-3">  </div>
  <div class="card-body">
    <h2>Edit Post</h2>
    <form method="post" action="{{route('admin.posts.update',$post->id)}}" enctype="multipart/form-data">
      @method('PUT')
      @csrf
      <div class="form-group">
        <label>Post Title</label>
        <input type="text" name="title" class="form-control" value="{{$post->title}}" required></input>
      </div>
      <div class="form-group">
        <label>Post Category</label>
        <select name="category" class="form-control">
          <optionvalue="">Choose Category</option>
          @<?php foreach ($categories as $category): ?>
            <option  @if($post->category_id==$category->id) selected @endif  value="{{$category->id}}">{{$category->name}}</option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label>Post Photo</label>
        <br>
        <img src="{{asset($post->image)}}" width="300"/>
        <input type="file" name="image" class="form-control" required></input>
      </div>
      <div class="form-group">
        <label>Post Content</label>
        <textarea id="editor" name="content" class="form-control" rows="10" required>{!!$post->content!!}</textarea>
      </div>
      <div class="form-group">
        <button type="submit" class="btn-primary btn-block">Edit Post</button>

      </div>

    </form>
    </div>
  </div>


@endsection
@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
$(document).ready(function() {
  $('#editor').summernote(
    {
      'height':300
    }
  );
});
</script>
@endsection
