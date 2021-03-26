@extends('back.layouts.master')
@section('content')
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Media</th>
            <th>Title</th>
            <th>Category</th>
            <th>ReadCount</th>
            <th>CreatedAt</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($posts as $post): ?>
            <tr>
              <td>
                <img src="{{asset($post->image)}} " width="200">
              </td>
              <td>{{$post->title}}</td>
              <td>{{$post->getCategory->name}}</td>
              <td>{{$post->hit}}</td>
              <td>{{$post->created_at->diffforHumans()}}</td>
              <td>
                <input class="switch" post-id="{{$post->id}}" type="checkbox" data-on="Publish" data-off="Hide"
                 data-offstyle="danger" @if($post->status==1) checked @endif data-toggle="toggle">
              </td>
              <td>
              <a target="blank" href="{{route('single',[$post->getCategory->slug,$post->slug])}}" title="Show" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
              <a href="{{route('admin.posts.edit',$post->id)}}" title="Edit" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
              <a href="{{route('admin.delete.post',$post->id)}}" title="Delete" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
            </td>
            </tr>
          <?php endforeach; ?>




        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection
@section('css')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
@section('js')
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script>
  $(function() {
    $('.switch').change(function() {
      id = $(this)[0].getAttribute('post-id');
      statu = $(this).prop('checked');

      $.get("{{route('admin.switch')}}",{id:id, statu:statu}, function(data, status){
  consol.log(data);
 });
    })
  })
</script>
@endsection
