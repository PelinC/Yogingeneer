@isset($categories)
<div class="col md-3">
  <div class="card">
    <div class="card-header">
      Categories
    </div>
    <div class="list-group">
      <?php foreach ($categories as $category): ?>
        <li class="list-group-item @if(Request::segment(2)==$category->slug)active  @endif">
          <a class="active" href="{{route('postcategories',$category->slug)}}">{{$category->name}}<span class="badge bg-warning float-right text-white">{{$category->postCount()}}</span></a>
        </li>
      <?php endforeach; ?>



    </div>
  </div>

</div>
@endif
