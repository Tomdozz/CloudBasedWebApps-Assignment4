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
      @if(Session::has('removed'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Yay!</strong> {{ Session::get('message', '') }}
        </div>
      @endif
      <ul class="list-group">
      @foreach ($products as $product)
        <li class="list-group-item">
          <h5>{{$product->title}}</h5>
          <a class="btn btn-primary" data-toggle="collapse" href="#editProduct{{$product->id}}" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Redigera denna produkt</a>
          <div class="collapse multi-collapse" id="editProduct{{$product->id}}">
            <div class="card card-body">
              <form action="{{ route('products.update', ['product' => $product->id]) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                  <label for="title">Ändra produktnamn</label>
                  <input type="text" class="form-control" id="title" name="title" value="{{$product->title}}" placeholder="{{$product->title}}">
                </div>
                <div class="form-group">
                  <label for="title">Byt bild</label>
                  <input type="text" class="form-control" id="image" name="image" value="{{$product->image}}" placeholder="{{$product->image}}">
                </div>
                <div class="form-group">
                  <label for="title">Uppdatera beskrivning</label>
                  <input type="text" class="form-control" id="description" name="description" value="{{$product->description}}" placeholder="{{$product->description}}">
                </div>
                <div class="form-group">
                  <label for="title">Ändra pris</label>
                  <input type="number" class="form-control" id="price" name="price" value="{{$product->price}}" placeholder="{{$product->price}}">
                </div>
                <button type="submit" class="btn btn-success button-padding">Uppdatera produkt</button>
              </form>
              <form action="{{ route('products.destroy', ['product' => $product->id]) }}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-success button-padding">Ta bort produkt</button>
            </form>
            </div>
          </div>
        </li>
      @endforeach
      </ul>
    </div>
  </div>

    <!--<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>-->
</div>
@endsection
