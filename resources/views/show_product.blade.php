<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Products</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                /* height: 100vh; */
                margin: 0;
            }

            .full-height {
                /* height: 100vh; */
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }
            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
          @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="container mt-5">
                {{-- {{session('msg')}} --}}
                <table class="table table-striped text-center">
 
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>User Id</th>
                      <th>Tile</th>
                      <th>Discription</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                    @foreach ($productArr as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->user_id}}</td>
                        <td>{{$product->title}}</td>
                        <td>{{$product->discription}}</td>
                        <td>
                            <a href="product_edit/{{$product->id}}" class="btn btn-outline-warning mb-1 mb-sm-1 mb-md-0">UPDATE</a>
                            <a href="product_delete/{{$product->id}}" class="btn btn-outline-danger mb-1 mb-sm-1 mb-md-0">DELETE</a>
                            <a href="category_detail/{{$product->id}}" class="btn btn-outline-primary mb-1 mb-sm-1 mb-md-0">Category Detail</a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <a href="products" class="btn btn-outline-primary my-4">Add Product</a>
                  </tfoot>
                </table>
              </div>
        </div>
    </body>
</html>
