<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Search</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Movie Search</h1>
        <form action="" method="get">            
            <div class="row">
                <div class="col-sm-10 col-md-10 mb-2">
                <input type="text" class="form-control" id="search-input" name="query" placeholder="Enter a movie title">
                </div>
                <div class="col-sm-2 col-md-2">
                <button type="submit" class="btn btn-primary btn-block">Search</button>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3 mt-3">
                <div class="card">
                    <img src="{{$responseArray['Poster']}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$responseArray['Title']}}</h5>
                        <p class="card-text">Movie synopsis goes here...</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4 col-lg-3 mt-3">
                <div class="card">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Movie Title</h5>
                        <p class="card-text">Movie synopsis goes here...</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4 col-lg-3 mt-3">
                <div class="card">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Movie Title</h5>
                        <p class="card-text">Movie synopsis goes here...</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4 col-lg-3 mt-3">
                <div class="card">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Movie Title</h5>
                        <p class="card-text">Movie synopsis goes here...</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <!-- Repeat the above code for each movie -->
        </div>
    </div>
    <!-- Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNS0Nxn" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
