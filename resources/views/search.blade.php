@extends('layout') 
@section('user')

<div class="row mb-5">
  <?php if($data){
    foreach ($data as $key => $movieData) {  ?>

      <div class="col-md-6 col-lg-4 mb-3">
        <div class="card h-100">
          <div class="card-body">
            <h5 class="card-title">{{$movieData['Title']}}</h5>
            <span onclick="setFav('{{$movieData['imdbID']}}','set');" style="float:right;"><i class="bx bx-heart"></i></span>
            <h6 class="card-subtitle text-muted">{{$movieData['Year']}}</h6>
          </div>
          <a href="{{route('viewDetail',base64_encode($movieData['imdbID']))}}"><img class="img-fluid" src="{{$movieData['Poster']}}" alt="Card image cap" /></a>
          <div class="card-body">
          </div>
        </div>
      </div> 
   <?php }
  } ?>
  
</div>

<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>

    function setFav(id,status){

        $.ajax({
            url: "{{route('setFav')}}",
            type: "post",                    
            data:{"_token": "{{ csrf_token() }}",id:id,status:status}, 
            success: function (response) {
                if(response == 'Y'){
                    toastr.success("Movie added as favourite.", "Marked Favourite",{
                        "positionClass": "toast-top-right",
                        "timeOut": "3000",
                        "extendedTimeOut": "1000",
                        "backgroundColor": "#36c6d3",
                        "fontSize": "20px",
                    });
                    $('.toast-success').css('background-color','green');
                }else{
                    toastr.error("Movie already in your favourites.", "Already Favourite",{
                        "positionClass": "toast-top-right",
                        "timeOut": "3000",
                        "extendedTimeOut": "1000",
                        "backgroundColor": "#36c6d3",
                        "fontSize": "20px",
                    });
                    $('.toast-error').css('background-color','red');
                }                     
            },                    
        }); 
    }
</script>

@endsection