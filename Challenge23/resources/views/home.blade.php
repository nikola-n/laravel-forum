@extends('layouts.app')

@section('content')
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
                            <div class="title col-md-7">
                            <h3>{{$theme->title}}</h4>
                            <p>{{$theme->description}}</p>
                            </div>
                            <div class="col-md-2">
                             <span>{{$theme->categories->topic}}|
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
                            <p class="col-md-8"><i>{{$comment->comments}}</i></p>
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
@endsection
