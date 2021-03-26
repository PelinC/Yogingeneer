@extends('front.layouts.master')
@section('title','  Yogingeneer')
@section('subtitle','  Data Scientist, Yoga Enthusiast')


@section('content')


      <div class="col-md-9 mx-auto">
        <h1 align="center",font-size="40px"><b>PROJECTS</b></h1>
            <?php foreach ($projects as $project): ?>
            <div class="post-preview">
              <a href="{{route('project',$project->slug)}}">
                <h2 class="post-title">
                  {{$project->title}}
                </h2>
                <img class="img-fluid"  src="{{$project->image}}"  widht="800" height="400"/>
                <h3 class="post-subtitle">
                  {!!str_limit($project->content,125)!!}
                </h3>
              </a>


                <p class="post-meta">
                    <li class="list-inline-item" >

                          <a target="blank" href="{{$project->git}}">

                            <span class=" fa fa-lg float-right " >
                              <i class="fas fa-circle fa-stack-1x "></i>
                              <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                            </span>

                        </li>
                        </a>
                      </p>
                      <hr>


              </div>

<hr>



            <?php endforeach; ?>
            {{$projects->links('pagination::bootstrap-4')}}



  </div>
@include('front.widgets.categoryWidget')
@endsection
