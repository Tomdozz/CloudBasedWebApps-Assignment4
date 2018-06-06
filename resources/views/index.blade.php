@extends('../blueprint')

@section('content')
<div class="container" style="padding-top: 20px;">
  <ul class="list-group">
    @foreach($products as $product)
        <li class="list-group-item">
          <h3>{{$product->title}}</h3>
          <img src="{{$product->image}}" alt="{{$product->title}}" style="max-width: 200px">
          <form action="{{ route('products.show', ['product' => $product->id]) }}" method="GET">
            <button type="submit" class="btn btn-success">läs mer</button>
          </form>
        </li>
    @endforeach
  </ul>
</div>
@endsection
