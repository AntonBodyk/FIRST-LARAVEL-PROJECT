@extends('layouts.admin')

@section('content') 
<div>
        <a href="{{route('post.create')}}" type="button" class="btn btn-warning mb-5">Добавить пост</a>
    </div>
    <div>
        @foreach($posts as $post)
            <a href="{{route('post.update', $post->id)}}"><div>{{$post->id}}.{{$post->title}}</div></a>
            <br>
        @endforeach

        <div>
            {{$posts->links()}}
        </div>
    </div>
@endsection 