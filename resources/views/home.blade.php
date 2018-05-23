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
<?php
  $order = $orders->slice(2);
?>

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
        <!--<a class="" href="{{ route('products.create') }}">Redigera order<span class="sr-only">(current)</span></a>-->
    </div>
    <div class="col-md-10">
      <ul class="list-group">
        @foreach ($orders as $order)
          <li class="list-group-item">
            <h5>Ordertitel: {{$order->title}}</h5>
            <i>Ordernr: {{$order->id}}</i><br>
            <i>Beställare: {{$order->name}}</i><br>
            <i>Telefonnummer: {{$order->phonenumber}}</i><br>
            <i>E-post: {{$order->email}}</i><br>
            <p>Berskrivning från beställare: {{$order->description}}</p>
            <a class="btn btn-primary" data-toggle="collapse" href="#updateProcess" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Uppdatera denna process</a>
            <a class="btn btn-primary" data-toggle="collapse" href="#updateCost" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Uppdatera kostnader</a>
            <div class="collapse multi-collapse" id="updateProcess">
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
            <div class="collapse multi-collapse" id="updateCost">
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
