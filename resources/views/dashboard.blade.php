@extends('layout') 
@section('user')

<div class="row mb-5">
  <?php if($data){
    foreach ($data as $key => $movieData) {  ?>

      <div class="col-md-6 col-lg-4 mb-3">
        <div class="card h-100">
          <div class="card-body">
            <h5 class="card-title">{{$movieData['Title']}}</h5>
            <h6 class="card-subtitle text-muted">{{$movieData['Released']}}</h6>
          </div>
          <img class="img-fluid" src="{{$movieData['Poster']}}" alt="Card image cap" />
          <div class="card-body">
            <p class="card-text">{{$movieData['Plot']}}</p>
            <span class="card-link">IMDB Rating : {{$movieData['imdbRating']}}</span>
          </div>
        </div>
      </div> 
   <?php }
  } ?>
  
</div>

@endsection