@extends('blueprint')

@section('content')
<style>
i{
  font-size: 70%;
}
a{
  color: black;
}
a:hover {
    color: white;
    background-color: grey;
}

</style>

<div class="container">
  <div class="row">
    <div class="col-md-2 border">
        <hr>
        <div class="logoutholder">
          <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logga ut</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
        </div>
        <hr>
        <a class="" href="{{ route('products.create') }}">Skapa ny produkt<span class="sr-only">(current)</span></a>
        <hr>
        <a class="" href="{{ route('editPage') }}" >Hantera produkter<span class="sr-only">(current)</span></a>
        <hr>
        <!--<a class="" href="{{ route('products.create') }}">Redigera order<span class="sr-only">(current)</span></a>-->
    </div>
    <div class="col-md-10">
      <ul class="list-group">
      @foreach ($orders as $order)
        <li class="list-group-item">
          <h5>{{$product->title}}</h5>
          <a class="btn btn-primary" data-toggle="collapse" href="#editProduct{{$order->id}}" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Redigera denna produkt</a>
          <div class="collapse multi-collapse" id="editProduct{{$order->id}}">
            <div class="card card-body">
              <form action="{{ route('order.update', ['order' => $order->id]) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                  <label for="title">Ändra orders titel</label>
                  <input type="text" class="form-control" id="title" name="title" value="{{$order->title}}" placeholder="{{$order->title}}">
                </div>
                <div class="form-group">
                  <label for="title">Ändra referensbild</label>
                  <input type="text" class="form-control" id="image" name="image" value="{{$order->image}}" placeholder="{{$order->image}}">
                </div>
                <div class="form-group">
                  <label for="title">Uppdatera beskrivning</label>
                  <input type="text" class="form-control" id="description" name="description" value="{{$order->description}}" placeholder="{{$order->description}}">
                </div>
                <div class="form-group">
                  <label for="title">Ändra beställarens namn</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{$order->name}}" placeholder="{{$order->name}}">
                </div>
                <div class="form-group">
                  <label for="title">Ändra beställarens emailadress</label>
                  <input type="text" class="form-control" id="email" name="email" value="{{$order->email}}" placeholder="{{$order->email}}">
                </div>
                <div class="form-group">
                  <label for="title">Ändra beställarens phonenumber</label>
                  <input type="text" class="form-control" id="phonenumber" name="phonenumber" value="{{$order->phonenumber}}" placeholder="{{$order->phonenumber}}">
                </div>
                <button type="submit" class="btn btn-success button-padding">Uppdatera produkt</button>
              </form>
              <!--<form action="{{ route('products.destroy', ['product' => $product->id]) }}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-success button-padding">Ta bort produkt</button>
            </form>-->
            </div>
          </div>
        </li>
      @endforeach
      </ul>
    </div>
  </div>
</div>
@endsection
