@extends('back.layouts.master')
@section('content')
<div class="card shadow mb-4">
  <div class="card-header py-3">  </div>
  <div class="card-body">
    <h2>Edit Project</h2>
    <form method="post" action="{{route('admin.projects.update',$project->id)}}" enctype="multipart/form-data">
      @method('PUT')
      @csrf
      <div class="form-group">
        <label>Project Title</label>
        <input type="text" name="title" class="form-control" value="{{$project->title}}" required></input>
      </div>
      <div class="form-group">
        <label>Project SourceCode</label>
        <input type="text" name="sc" class="form-control" value="{{$project->git}}" required></input>
      </div>

      <div class="form-group">
        <label>Project Photo</label>
        <br>
        <img src="{{asset($project->image)}}" width="300"/>
        <input type="file" name="image" class="form-control" required></input>
      </div>
      <div class="form-group">
        <label>Project Content</label>
        <textarea id="editor" name="content" class="form-control" rows="10" required>{!!$project->content!!}</textarea>
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
