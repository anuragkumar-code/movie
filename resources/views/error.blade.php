@extends('layout') 
@section('user')
<div class="container-xxl container-p-y">

<div class="misc-wrapper" style="margin-left: 360px; margin-top: 30px;">
    <h2 class="mb-2 mx-2">Movie Not Found :(</h2>
    <p class="mb-4 mx-2">Oops! 😖 The requested movie : {{$name}} was not found in our database.</p>
    <a href="{{route('dashboard')}}" class="btn btn-primary">Back to home</a>
    <div class="mt-3">
      <img
        src="../assets/img/illustrations/page-misc-error-light.png"
        alt="page-misc-error-light"
        width="500"
        class="img-fluid"
        data-app-dark-img="illustrations/page-misc-error-dark.png"
        data-app-light-img="illustrations/page-misc-error-light.png"
      />
    </div>
</div>
</div>

@endsection