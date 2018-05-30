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
        <a class="" href="{{ route('editPage') }}">Hantera produkter<span class="sr-only">(current)</span></a>
        <hr>
        <!--<a class="" href="{{ route('products.create') }}">Redigera order<span class="sr-only">(current)</span></a>-->
    </div>
    <div class="col-md-10">
      @if(Session::has('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Yay!</strong> {{ Session::get('message', '') }}
        </div>
      @endif
      <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="title">Ge din produkt ett namn</label>
              <input type="text" class="form-control" id="title" name="title" required="required">
            </div>
            <div class="form-group">
              <label for="title">Lägg till en exempelbild</label>
              <input type="text" class="form-control" id="image" name="image" required="required">
            </div>
            <div class="form-group">
              <label for="title">Beskriv produkten</label>
              <input type="text" class="form-control" id="description" name="description" required="required">
            </div>
            <div class="form-group">
              <label for="title">Sätt pris</label>
              <input type="number" class="form-control" id="price" name="price" required="required">
            </div>
            <button type="submit" class="btn btn-success">Spara produkt</button>
        </form>
      </div>
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
