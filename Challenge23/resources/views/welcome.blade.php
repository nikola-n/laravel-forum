<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">


        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
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
        <div class="flex-center position-ref">
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
        </div>

            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-8">

                        <h1 class="text-center py">Welcome to the Forum</h1>
                    <button class="btn btn-1"><a href={{route('create')}}>Add new discussion</a></button> <br>
                        @foreach($themes as $theme)
                        <div class="card" style="margin-bottom:1%;">
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <div class="container-fluid col-md-12">
                                    <div class="row" style="display:flex; align-items:center;">
                                        <div class="col-md-3">
                                        <img src="{{$theme->image}}" class="img-style" alt="manutd">
                                        </div>
                                        <div class="col-md-7">
                                        <h3>{{$theme->title}}</h4>
                                        <p>{{$theme->description}}</p>
                                        </div>
                                        <div class="col-md-2">
                                         <span>{{$theme->categories->topic}} |
                                            {{$theme->users->name}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach($comments as $comment)
                        @if($theme->status == "Approved")
                        <div class="col-md-12 commentStyle">
                            <div class="row">
                                <p class="col-md-8"><i>
                                <p class="col-md-4"><b>Auhtor: {{$comment->users->name}}</b>
                               <br>
                                <b>Time: {{$comment->date}}</b></p>
                               </div>
                        </div>
                        @endif
                        @endforeach
                        @endforeach

                    </div>
                </div>
            </div>

    </body>
</html>
