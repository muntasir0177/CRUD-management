@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Show Post</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary btn-sm" href="{{ route('posts.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
        <div class="form-group">
            <strong>Title:</strong>
            <p>{{ $post->title }}</p>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
        <div class="form-group">
            <strong>Content:</strong>
            <p>{{ $post->content }}</p>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
        <div class="form-group">
            <strong>Image:</strong><br>
            @if($post->image)
                <img src="{{ $post->image }}" alt="Post Image" style="max-width: 300px;" class="img-thumbnail">
            @else
                <span class="text-muted">No image provided.</span>
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
        <div class="form-group">
            <strong>Author:</strong>
            <p>{{ $post->user->name ?? 'Unknown' }}</p>
        </div>
    </div>
</div>
@endsection