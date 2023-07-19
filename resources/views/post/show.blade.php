@extends('layouts.main_layout')
@section('content')
    <div>
        <div>{{$post->id}}.{{$post->title}}</div>
        <div>{{$post->content}}</div>
        <div>{{$post->likes}}</div>
    </div>
    <div>
        <a href="{{route('post.edit', $post->id)}}">Оновити дані</a>
    </div>
    <div>
        <form action="{{route('post.destroy', $post->id)}}" method="post">
            @csrf 
            @method('delete')
            <button type="submit" class="btn btn-danger">Видалити</button>
        </form>
    </div>
    <div>
        <a href="{{route('post.index')}}">Назад</a>
    </div>
@endsection