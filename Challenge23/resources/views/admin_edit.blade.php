@extends('layouts.app')

@section('content')


<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h1 class="text-center py">Welcome to the Forum</h1>
                <button class="btn btn-1"><a href="{{URL::to('/create')}}">Add new discussion</a></button> <br>
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
                            <div class="title col-md-5">
                            <h3>{{$theme->title}}</h4>
                            <p>{{$theme->description}}</p>
                            </div>
                            <div class="col-md-2">
                             <span>{{$theme->categories->topic}}|
                                {{$theme->users->name}}
                                </span>
                            </div>
                            <div class="col-md-2">
                            @if($theme->status == "Approved")
                            <button class="btn btn-success"><a href="{{URL::to('admin/approve')}}/{{$theme->id}}" style="text-decoration:none; color:black;">{{$theme->status}}</a></button>
                            @elseif($theme->status == "Unapproved")
                            <button class="btn btn-danger"><a href="{{URL::to('admin/approve')}}/{{$theme->id}}"style="text-decoration:none; color:black;">{{$theme->status}}</a></button>
                            @endif
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
            @if($theme->status == "Approved")
                <div class="col-md-12 showCom" style="display:none;">
                <form action="{{URL::to('/admin/comment')}}"method="post">
                        @csrf
                        <textarea name="comments" style="width:100%; height:100px;"></textarea>
                        <button class="btn btn-primary" style="margin-left:85%; margin-bottom:1%;">Submit</button>
                    </form>
                </div>
                <button class="btn btn-primary com"style="margin-left:85%; margin-bottom:1%;">Add comments</button>
            @endif
            @endforeach
        </div>
    </div>
</div>

<script
  src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
  crossorigin="anonymous"></script>

  <script>
  let com =$('.com');
  let showComment = $('.showCom');
  com.on('click',function(){
    $('.showCom').each(function(){
        $(this).show();
    });
        $('.com').hide();
  });

  </script>
@endsection

