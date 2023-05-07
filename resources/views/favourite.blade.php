@extends('layout') 
@section('user')

<style>
  img{
    height:85px;
  }
</style>
<div class="card">
    <h5 class="card-header">Favourites</h5>
    <div class="table-responsive text-nowrap">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Movie</th>
            <th>Poster</th>
            <th>Ratings (IMDB)</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          <?php if($getData){
            foreach ($getData as $key => $value) {  ?>
              <tr id="toHide{{$value->id}}">
                <td><a href="{{route('viewDetail',base64_encode($value->favourite_id))}}"><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$value->favourite_name}}</strong></a></td>
                <td><img src="{{$value->favourite_poster}}" alt=""></td>
                <td><span class="badge bg-label-primary me-1">{{$value->favourite_ratings}} / 10</span></td>
                <td>
                  <a class="btn btn-danger" onclick="deleteFav('{{$value->id}}');" href="javascript:void(0);"><i class="bx bx-trash me-1"></i></a>
                </td>
              </tr>
            <?php }
          } ?>          
        </tbody>
      </table>
    </div>
</div>

<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
  function deleteFav(id){
    // console.log(id);
    $.ajax({
      url: "{{route('delete')}}",
      type: "post",                    
      data:{"_token": "{{ csrf_token() }}",id:id}, 
      success: function (response) {
        $('#toHide'+id).css('display','none');
        toastr.error("Movie removed from your favourites.", "Removed",{
            "positionClass": "toast-top-right",
            "timeOut": "3000",
            "extendedTimeOut": "1000",
            "backgroundColor": "#36c6d3",
            "fontSize": "20px",
        });
        $('.toast-error').css('background-color','red');
                             
      },                    
    }); 

  }
</script>

@endsection              