@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New Post</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary btn-sm" href="{{ route('posts.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger mt-3">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="mt-3">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="Post Title">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
            <div class="form-group">
                <strong>Content:</strong>
                <textarea class="form-control" name="content" rows="5" placeholder="Post Content">{{ old('content') }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
            <div class="form-group">
                <strong>Image URL:</strong>
                <input type="text" name="image" value="{{ old('image') }}" class="form-control" placeholder="Image URL (optional)">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
        </div>
    </div>
</form>
@endsection