@extends('blueprint')

@section('content')
<style>
img {
    display:block;
    margin:auto;
}
center {
    text-align:center
}
</style>
<div class="container center" style="padding-top: 20px;">
  <img src="https://i1015.photobucket.com/albums/af279/versip/sad1.png" alt="failimg">
  <h4>{{$errorMessage}}<h4>
  <h4>{{$errorCode}}</h4>
  <div class="border center">
    <i>Mer detaljer</i><br>
    <i>{{$exceptionMessage}}</i>
  </div>
</div>


@endsection
