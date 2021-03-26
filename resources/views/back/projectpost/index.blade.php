@extends('back.layouts.master')
@section('content')
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Projects Table</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Media</th>
            <th>Title</th>
            <th>source-code</th>
            <th>ReadCount</th>
            <th>CreatedAt</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($projects as $project): ?>
            <tr>
              <td>
                <img src="{{asset($project->image)}} " width="200">
              </td>
              <td>{{$project->title}}</td>
              <td>{{$project->git}}</td>
              <td>{{$project->hit}}</td>
              <td>{{$project->created_at->diffforHumans()}}</td>
              <td>
                <input class="switch" project-id="{{$project->id}}" type="checkbox" data-on="Publish" data-off="Hide"
                 data-offstyle="danger" @if($project->status==1) checked @endif data-toggle="toggle">
              </td>
              <td>
              <a target="blank" href="{{route('project',$project->slug)}}" title="Show" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
              <a href="{{route('admin.projects.edit',$project->id)}}" title="Edit" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
              <a href="{{route('admin.delete.project',$project->id)}}"  title="Delete" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
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
      id = $(this)[0].getAttribute('project-id');
      statu = $(this).prop('checked');

      $.get("{{route('admin.projectswitch')}}",{id:id, statu:statu}, function(data, status){
  consol.log(data);
 });
    })
  })
</script>
@endsection
