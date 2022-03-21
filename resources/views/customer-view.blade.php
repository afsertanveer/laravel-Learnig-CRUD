<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
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
        <form action="" method="GET" class="col-9">
            <div class="form-group">
              <input type="search" name="search" id="" class="form-control"
              placeholder="search by name or email" value="{{ $search }}" aria-describedby="helpId">
            </div>
            <button class="btn btn-primary">Search</button>
          </form>

        <a href="{{ route('customer.create') }}">
        <button type="button" name="" id="" class="btn btn-primary" btn-lg btn-block" style="float: right;">Add</button>
        </a>
        <a href="{{ route('customer.trash') }}">
          <button type="button" name="" id="" class="btn btn-danger" btn-lg btn-block" style="float: right;">Goto Trash</button>
          </a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Country</th>
                    <th>State</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $customers as $customer )

                <tr>
                    <td>{{ $customer->customer_id+1 }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>
                      @if($customer->gender=='M')
                       Male
                       @elseif ($customer->gender=='F')
                       Female
                       @else
                       Others
                       @endif

                    </td>
                    <td>{{$customer->dob}}</td>
                    <td>{{ $customer->country }}</td>
                    <td>{{ $customer->state }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>
                        @if ($customer->status==1)
                                <a href="">
                                <span class="badge badge-success">Active </span>
                                </a>
                                @else
                                <a href="">
                                 <span class="badge badge-danger">Incative</span>
                                </a>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('customer.delete',['id'=>$customer->customer_id]) }}">
                          <button class='btn btn-danger'>Move to trash</button>
                        </a>
                        <a href="{{ route('customer.edit',['id'=>$customer->customer_id]) }}">
                          <button class='btn btn-primary'>Edit</button>
                        </a>
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>
    </div>
     <div class="row">
    {{ $customers->links() }}
        </div>

  </body>
</html>
