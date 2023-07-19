@extends('layouts.main_layout')
@section('content')
    <div>
    <form action="{{route('post.update', $post->id)}}" method="post">
        @csrf 
        @method('patch')
        <div class="mb-3">
            <label for="title" class="form-label">Назва поста</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Назва поста">
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Контент поста</label>
            <textarea type="text" name="content" class="form-control" id="content" placeholder="Контент поста"></textarea>
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Картинка</label>
            <input type="text" name="image" class="form-control" id="image" placeholder="Картинка">
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
        </div>
        <div class="mb-3">
            <label for="likes" class="form-label">Кол-во лайков</label>
            <input type="text" name="likes" class="form-control" id="likes" placeholder="Кол-во лайков">
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
        </div>
        <div class="form-group">
            <label for="category" class="form-label">Category</label>
            <select class="form-select mb-3" aria-label="Default select example" name="category_id">
                @foreach($categories as $category)
                    <option {{$category->id === $post->category_id ? 'selected' : ''}} 
                        value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <label for="tags" class="form-label">Tags</label>
        <select class="form-select mb-3" multiple id="tags" name="tags[]"> 
            @foreach($tags as $tag)
                <option 
                @foreach($post->tags as $postTag)
                    {{$tag->id === $postTag->id ? 'selected' : ''}}
                @endforeach
                    value="{{$tag->id}}">{{$tag->title}}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    </div>
@endsection