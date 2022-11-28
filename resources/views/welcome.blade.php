<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Crud with Login Sistem</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </head>
    <body class="antialiased">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" arial-current="page" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-danger" arial-current="page" href="{{ url('products/{ Auth::user()->id }') }}">Add Product</a>
              <li class="nav-item">
                <a class="btn btn-danger ml-2" arial-current="page" href='my-products/{{ Auth::user()->id}}'>My Product</a>
          </li>
            </li>
          @guest
            @if(Route::has('login'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
            @endif

            @if(Route::has('login'))
              <li class="nav-item">
                <a class="nav-link" href="{{ Route('register') }}">{{ __('Register') }}</a>
              </li>
            @endif

          @else

            <li class="nav-item dropdown">
            <a class="nav-link dropdown" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{ Auth::user()->name }} <i class="fa fa-caret-down"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </div>
          </li>

          @endguest
          </ul>
        </div>
      </div>
    </nav>

        <div class="container mt-3">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Amount</th>
                        <th>Price</th>
                        <th>Action</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($product as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->type }}</td>
                        <td>{{ $item->amount }}</td>
                        <td>{{ $item->price }}</td>
                        <td><a class="btn btn-warning" href="{{ url('edit/' . $item->id) }}"><i class="fa fa-edit"></i></a></td>
                        <td><a class="btn btn-danger" href="{{ url('delete/'. $item->id) }}"><i class="fa fa-trash"></i></a></td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>
