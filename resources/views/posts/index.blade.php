@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Posts</h2>
        </div>
        <div class="pull-right">
            @can('post-create')
            <a class="btn btn-success btn-sm mb-2" href="{{ route('posts.create') }}"><i class="fa fa-plus"></i> Create New Post</a>
            @endcan
        </div>
    </div>
</div>

@session('success')
<div class="alert alert-success" role="alert">
    {{$value}}
</div>
@endsession
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Title</th>
        <th>Content</th>
        <th>Image</th>
        <th>Action</th>
    </tr>
    @foreach($posts as $post)
    <tr>
        <td>{{$i++}}</td>
        <td>{{$post->title}}</td>
        <td>{{$post->content}}</td>
        <td>{{$post->image}}</td>
        <td>
            <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                <a class="btn btn-info btn-sm" href="{{ route('posts.show',$post->id) }}"><i class="fa-solid fa-list"></i> Show</a>
                @can('post-edit')
                <a class="btn btn-primary btn-sm" href="{{ route('posts.edit',$post->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                @endcan

                @csrf
                @method('DELETE')

                @can('post-delete')
                
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this post?')"><i class="fa-solid fa-trash"></i> Delete</button>
                @endcan
            </form>
        </td>
    </tr>
    @endforeach
</table>
{!! $posts->links('pagination::bootstrap-5') !!}

@endsection
