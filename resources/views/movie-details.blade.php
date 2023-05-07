@extends('layout') 
@section('user')

<h5 class="pb-1 mb-4">Movie Detail</h5>
<div class="row mb-5">
  <div class="col-md">
    <div class="card mb-3">
      <div class="row g-0">
        <div class="col-md-4">
          <img class="card-img card-img-left" src="{{$responseArray['Poster']}}" alt="Card image" />
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h2 class="card-title">{{$responseArray['Title']}}</h2>
            <h5 class="card-title">Year : {{$responseArray['Year']}}</h5>
            <h5 class="card-title">Genre : {{$responseArray['Genre']}}</h5>
            <h5 class="card-title">Ratings : {{$responseArray['imdbRating']}} / 10</h5>
            <h5 class="card-title">Director : {{$responseArray['Director']}}</h5>
            <h5 class="card-title">Writer : {{$responseArray['Writer']}}</h5>
            <h5 class="card-title">Actors : {{$responseArray['Actors']}}</h5>
            <h5 class="card-title">Awards : {{$responseArray['Awards']}}</h5>
            <h5 class="card-title">Box Office : {{$responseArray['BoxOffice']}}</h5>
            <p class="card-text">
            {{$responseArray['Plot']}}
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection