

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet"
          href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script
        src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script
        src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
        .full-height {
            height: 100vh;
        }
        .flex-center {
            padding-top: 100px;
            padding-left: 20px;
            display: flex;
            justify-content: left;
        }
        .position-ref {
            position: relative;
        }
        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
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

    </style>
</head>
<body>
<div class="flex-center position-ref ">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home')  }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif
    <div class="d-flex flex-column">
        <form  action="search" method="get" role="search">
            <input type="text"  name="q" placeholder="Search author"/>
            <button type="submit">Search</button>
        </form>
        <form  action="search" method="get" role="search">
            <input type="text"  name="q" placeholder="Search title"/>
            <button type="submit">Search</button>
        </form>
        <form  action="search" method="get" role="search">
            <input type="text"  name="q" placeholder="Search description"/>
            <button type="submit">Search</button>
        </form>
    </div>
</div>
<div>
    @if(isset($books))
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Author</th>
                <th>Title</th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book )
                <tr>
                    <td>{{$book->name}}</td>
                    <td>{{$book->title}}</td>
                    <td><a href="{{route('rents.create')}}">Rent</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</div>
</body>
</html>

