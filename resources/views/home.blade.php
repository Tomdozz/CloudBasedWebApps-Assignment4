@extends('blueprint')

@section('content')
<style>
i{
  font-size: 70%;
}
</style>
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <ul class="list-group">
        @foreach ($orders as $order)
          <li class="list-group-item">
            <h5>Ordertitel: {{$order->title}}</h5>
            <i>Beställare: {{$order->name}}</i><br>
            <i>Telefonnummer: {{$order->phonenumber}}</i><br>
            <i>E-post: {{$order->email}}</i><br>
            <p>Berskrivning från beställare: {{$order->description}}</p>
            {{$order->orderInProg}}
          </li>
        @endforeach
      </ul>
      {{$orders}}
    </div>
    <div class="col-md-6">
      {{$ordersInProg}}
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
