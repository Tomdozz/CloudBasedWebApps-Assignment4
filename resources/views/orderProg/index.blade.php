@extends('../blueprint')

@section('content')
<div class="container" style="padding-top: 20px;">
  <ul class="list-group">
    @foreach($orderinProgs as $orderinProg)
        <li class="list-group-item">
          <h3>{{orderinProg->title}}</h3>
          <img src="{{orderinProg->image}}" alt="{{orderinProg->title}}" style="max-width: 200px">
          <p>{{$orderinProg->description}}</p>
        </li>
    @endforeach
  </ul>
</div>
@endsection
