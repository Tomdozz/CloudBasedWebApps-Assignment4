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
  @if(Session::has('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Yay!</strong> {{ Session::get('message', '') }}
    </div>
  @endif
  <div class="row">
    <div class="col-md-12">
      <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="title">Vad vill du beställa?</label>
              <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
              <label for="title">Lägg till en exempelbild</label>
              <input type="text" class="form-control" id="image" name="image">
            </div>
            <div class="form-group">
              <label for="title">Beskriv produkten</label>
              <input type="text" class="form-control" id="description" name="description">
            </div>
            <div class="form-group">
              <label for="title">Sätt maxpris</label>
              <input type="number" class="form-control" id="price" name="price">
            </div>
            <hr>
            <i>Kontaktuppgifter</i>
            <div class="form-group">
              <label for="title">Namn</label>
              <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
              <label for="title">E-post</label>
              <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
              <label for="title">Telefonnummer</label>
              <input type="text" class="form-control" id="phonenumber" name="phonenumber">
            </div>
            <button type="submit" class="btn btn-success">Lägg order</button>
        </form>
      </div>
    </div>
  </div>

</div>
@endsection
