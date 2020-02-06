@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <div class="card-body">
                <form method="post"  enctype="multipart/form-data" action="{{route('store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="title" class="col-md-4 col-form-label text-md">{{ __('Title') }}</label>
                            <div class="col-md-12">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="image" class="col-md-4 col-form-label text-md">{{ __('Photo') }}</label>
                            <div class="col-md-12">
                                <input id="image" type="file" class="@error('image') is-invalid @enderror" name="image" required autocomplete="current-password">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-md-4 col-form-label text-md">{{ __('Description') }}</label>
                            <div class="col-md-12">
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="current-password"></textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group" style="display:inline-flex;">
                        <label for="topic" class="col-md-4 col-form-label text-md">{{ __('Category') }}</label>
                        <div class="col-md-12">
                        <select name="topic" id="topic"style="margin-top:4%;">
                            <option value="">Choose</option>
                            @foreach($categories as $c)
                            <option value="{{$c->id}}">{{$c->topic}}</option>
                            @endforeach
                        </select>
                        </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection





