<!doctype html>
<html lang="en">
  <head>
    <title>Customer </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
            <a class="nav-link" href="{{ url('/customer/create') }}" style="color:white">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/customer/view') }}" style="color:white">Customer</a>
          </li>
        </ul>
      </div>
    </nav>
    <form action="{{ $url }}" method="POST">
        @csrf'
        
    <div class="container">
        <h1 class='text-center'> {{ $title }} </h1>
        <div class="form-group">
          <label for="">Name</label>
          @if (!empty($customer->name))
            <input type="text" name="name" id="" value="{{$customer->name}}" class="form-control"  aria-describedby="helpId">
          
          @else
          <input type="text" name="name" id="" value="{{old('name')}}" class="form-control"  aria-describedby="helpId">
          
          @endif
          <span class="text-danger">
            @error('name')
              {{ $message }}
            @enderror
          </span>    
        </div>
            <div class="form-group">
              <label for="">Email</label>
              @if (!empty($customer->email))
                  
              <input type="email" name="email" id="" value="{{$customer->email}}" class="form-control"  aria-describedby="helpId">
              @else
              <input type="email" name="email" id="" value="{{old('email')}}" class="form-control"  aria-describedby="helpId" >
                
              @endif
                
             <span class="text-danger">
              @error('email')
                {{ $message }}
              @enderror
            </span>
            </div>
                @if(empty($customer->password))
                <div class="form-group">
                  <label for="">Password</label>
                  <input type="password" name="password" id="" class="form-control"  aria-describedby="helpId">
                    
                 <span class="text-danger">
                  @error('password')
                    {{ $message }}
                  @enderror
                </span>
                </div>

                <div class="form-group">
                  <label for="">Confirm Password</label>
                  <input type="password" name="password_confirmation" id="" class="form-control"  aria-describedby="helpId">
                    
                 <span class="text-danger">
                  @error('password_confirmation')
                    {{ $message }}
                  @enderror
                </span>
                </div>
                @endif
                <div class="form-group">
                    <label for="">Country</label>
                    <input type="text" name="country" value="{{ $customer->country }}" id="" class="form-control"  aria-describedby="helpId">
                      
                   <span class="text-danger">
                    @error('country')
                      {{ $message }}
                    @enderror
                  </span>
                  </div>

                  <div class="form-group">
                    <label for="">State</label>
                    <input type="text" name="state" value="{{ $customer->state }}" id="" class="form-control"  aria-describedby="helpId">
                      
                   <span class="text-danger">
                    @error('state')
                      {{ $message }}
                    @enderror
                  </span>
                  </div>

                  <div class="form-group">
                    <label for="">Address</label>
                    <input type="textarea" value="{{ $customer->address }}" name="address" id="" class="form-control"  aria-describedby="helpId">
                      
                   <span class="text-danger">
                    @error('address')
                      {{ $message }}
                    @enderror
                  </span>
                  </div>
                  <div class="form-group">
                    <label for="">Gender</label>
                    <input type="radio" id="" name="gender" value="M" {{ ($customer->gender=="M") ? "checked=checked":"" }}  />
                    
                    <label for="html">Male</label>
                      <input type="radio" id="" name="gender" value="F" {{ $customer->gender=='F'? "checked=checked":"" }} >
                     
                      <label for="css">Female</label>
                      <input type="radio" id="" name="gender" value="O" {{ $customer->gender=='O'? "checked=checked":"" }} >
                     
                    <label for="javascript">Others</label>
                      
                   <span class="text-danger">
                    @error('gender')
                      {{ $message }}
                    @enderror
                  </span>
                  </div>

                  <div class="form-group">
                    <label for="">Date of birth</label>
                    <input type="date" name="dob" id="" value="{{ $customer->dob }}" class="form-control"  aria-describedby="helpId">
                      
                   <span class="text-danger">
                    @error('dob')
                      {{ $message }}
                    @enderror
                  </span>
                  </div>

                <button class="btn btn-primary">
                    Submit
                </button>
    </div>
</form>
</body>
</html>