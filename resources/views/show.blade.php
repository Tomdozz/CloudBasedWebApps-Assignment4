@extends('../blueprint')

@section('content')
<style>
.content{
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
</style>
<div class="content">
  <h1>{{$product->title}}</h1>
  <p>Beskrivning: {{$product->description}}</p>
  <img src="{{$product->image}}" alt="{{$product->title}}" style="max-width: 400px">
</div>
@endsection
