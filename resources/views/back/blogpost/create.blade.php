@extends('back.layouts.master')
@section('content')
<div class="card shadow mb-4">
  <div class="card-header py-3">  </div>
  <div class="card-body">
    <h2>Create Post</h2>
    <form method="post" action="{{route('admin.posts.store')}}" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label>Post Title</label>
        <input type="text" name="title" class="form-control" required></input>
      </div>
      <div class="form-group">
        <label>Post Category</label>
        <select name="category" class="form-control">
          <option value="">Choose Category</option>
          @<?php foreach ($categories as $category): ?>
            <option value="{{$category->id}}">{{$category->name}}</option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label>Post Photo</label>
        <input type="file" name="image" class="form-control" required></input>
      </div>
      <div class="form-group">
        <label>Post Content</label>
        <textarea id="editor" name="content" class="form-control" rows="10" required></textarea>
      </div>
      <div class="form-group">
        <button type="submit" class="btn-primary btn-block">Post</button>

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
<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>

<script>
CKEDITOR.replace( 'editor' );
</script>
@endsection
