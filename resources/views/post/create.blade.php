@extends('layouts.main_layout')
@section('content')
    <div>
    <form action="{{route('post.store')}}" method="post">
        @csrf 
        <div class="mb-3">
            <label for="title" class="form-label">Назва поста</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Назва поста" value="{{old('title')}}">
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            @error('title')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Контент поста</label>
            <textarea type="text" name="content" class="form-control" id="content" placeholder="Контент поста">{{old('content')}}</textarea>
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            @error('content')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label" value="{{old('image')}}">Картинка</label>
            <input type="text" name="image" class="form-control" id="image" placeholder="Картинка">
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            @error('image')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="likes" class="form-label" value="{{old('likes')}}">Кол-во лайков</label>
            <input type="text" name="likes" class="form-control" id="likes" placeholder="Кол-во лайков">
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            @error('likes')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="category" class="form-label">Category</label>
            <select class="form-select mb-3" aria-label="Default select example" name="category_id">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <label for="tags" class="form-label">Tags</label>
        <select class="form-select mb-3" multiple id="tags" name="tags[]"> 
            @foreach($tags as $tag)
                <option value="{{$tag->id}}">{{$tag->title}}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">create</button>
    </form>
    </div>
@endsection