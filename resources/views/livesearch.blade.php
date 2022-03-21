<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand" href="#" style="color:white">Laravel Sample Project </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ url('/') }}" style="color:white">Home <span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/register') }}" style="color:white">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/customer/view') }}" style="color:white">Customer</a>
            </li>
          </ul>
        </div>
      </nav>
    <div class="container">
        <div class="row m-2">
        <div class="form-group">
              <h4>Search by name,email</h4>
                <input type="text" name="search" autocomplete="off" id="search" class="form-control"
              placeholder="search by name or email"  onfocus="this.value">
            </div>

        <div id='search_list'>

        </div>
 </div>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


 <script>
    $(document).ready(function(){
     $('#search').on('keyup',function(){
         var query= $(this).val();
         $.ajax({
            url:"search",
            type:"GET",
            data:{'search':query},
            success:function(data){
                $('#search_list').html(data);
            }
     });
     //end of ajax call
    });
    });
</script>

  </body>
</html>
