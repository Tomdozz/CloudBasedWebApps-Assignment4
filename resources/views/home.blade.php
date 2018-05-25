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
        <!--<hr>
        <a class="" href="{{ route('orders.index') }}" >Hantera produkter<span class="sr-only">(current)</span></a>
        <hr>-->
        <!--<a class="" href="{{ route('products.create') }}">Redigera order<span class="sr-only">(current)</span></a>-->
    </div>
    <div class="col-md-10">
      @if(Session::has('update'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Yay!</strong> {{ Session::get('message', '') }}
        </div>
      @endif
      @if(Session::has('delete'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ Session::get('message', '') }}
        </div>
      @endif
      @if(Session::has('updateprocess'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Yay!</strong> {{ Session::get('message', '') }}
        </div>
      @endif
      @if(Session::has('updatecost'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Yay!</strong> {{ Session::get('message', '') }}
        </div>
      @endif
      <h3>Hantera dina ordrar här:</h3>
      <ul class="list-group">
        @foreach ($orders as $order)
          <li class="list-group-item">
            <h5>Ordertitel: {{$order->title}}</h5>
            <i>Ordernr: {{$order->id}}</i><br>
            <i>Beställare: {{$order->name}}</i><br>
            <i>Telefonnummer: {{$order->phonenumber}}</i><br>
            <i>E-post: {{$order->email}}</i><br>
            <p>Berskrivning från beställare: {{$order->description}}</p>
            <a class="btn btn-primary" data-toggle="collapse" href="#updateProcess{{$order->id}}" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Uppdatera denna process</a>
            <a class="btn btn-primary" data-toggle="collapse" href="#updateCost{{$order->id}}" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Uppdatera kostnader</a>
            <a class="btn btn-primary" data-toggle="collapse" href="#editProduct{{$order->id}}" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Uppdatera order</a>
            <div class="collapse multi-collapse" id="editProduct{{$order->id}}">
              <div class="card card-body">
                <h5>Uppdatera denna Order</h5>
                <form action="{{ route('orders.update', ['order' => $order->id]) }}" method="POST">
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
                <form action="{{ route('orders.destroy', ['product' => $order->id]) }}" method="post">
                  @method('DELETE')
                  @csrf
                  <button type="submit" class="btn btn-success button-padding">Ta bort denna order</button>
                </form>
              </div>
            </div>
            <div class="collapse multi-collapse" id="updateProcess{{$order->id}}">
              <div class="card card-body">
                <h5>Uppdatera denna process</h5>
                <form action="{{route('ordersinprog.update', ['orderinprogs' => $order->orderInProg->id])}}" method="post">
                  @method('PUT')
                  @csrf
                  <div class="form-group">
                    <label for="title">Titel</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$order->orderInProg->title}}" placeholder="{{$order->orderInProg->title}}">
                  </div>
                  <div class="form-group">
                    <label for="title">Uppdatera bild</label>
                    <input type="text" class="form-control" id="image" name="image" value="{{$order->orderInProg->image}}" placeholder="{{$order->orderInProg->image}}">
                  </div>
                  <div class="form-group">
                    <label for="title">Uppdatera prosessstatus med ny beskrivning</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{$order->orderInProg->description}}" placeholder="{{$order->orderInProg->description}}">
                  </div>
                  <button type="submit" class="btn btn-success button-padding" >Uppdatera</button>
                </form>
                <hr>
              </div>
            </div>
            <div class="collapse multi-collapse" id="updateCost{{$order->id}}">
              <div class="card card-body">
                <h5>Uppdatera arbetstid och kostnad</h5>
                <form action="{{route('cost.update', ['cost' => $order->costs->id])}}" method="post">
                  @method('PUT')
                  @csrf
                  <div class="form-group">
                    <label for="title">Lägg till arbetstid</label>
                    <input type="number" class="form-control" id="worktime" name="worktime">
                  </div>
                  <div class="form-group">
                    <label for="title">Lägg till materialkostnad</label>
                    <input type="number" class="form-control" id="material" name="material">
                  </div>
                  <div class="form-group">
                    <label for="title">Uppdatera timkostnad</label>
                    <input type="number" class="form-control" id="hourcost" name="hourcost" value="{{$order->costs->hourcost}}" placeholder="{{$order->costs->hourcost}}">
                  </div>
                  <div class="form-group">
                    <label for="title">Anteckningar</label>
                    <input type="text" class="form-control" id="notes" name="notes" value="{{$order->costs->notes}}" placeholder="{{$order->costs->notes}}">
                    <i>Den totala kostnaden för denna order är just nu {{$order->costs->totalcost}} kr </i>
                    <?php
                      if($order->costs->totalcost >= $order->maxprice){
                        echo "<i style='color: red'>Kostnaden börjar dra iväg och du går över kundens maxpris</i>";
                      }
                    ?>
                  </div>
                  <button type="submit" class="btn btn-success button-padding" >Uppdatera</button>
                </form>
                <hr>
              </div>
            </div>
          </li>
          <!--{{$order->orderInProg}}
          {{$order->costs}}-->
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
