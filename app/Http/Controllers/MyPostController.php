<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\TagPost;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        // $categories = Category::find(1);
        $posts = Post::all();
        
        // $posts = Post::where('category_id', $categories->id)->get();
        // dd($posts->tags);
        return view('post.index', compact('posts'));
    }

    public function create(){
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact('categories', 'tags'));
        // $postsArr = [
        //     [
        //         'title' => 'title for post',
        //         'content' => 'Some post content',
        //         'image' => 'post.jpg',
        //         'likes' => 20,
        //         'is_published' => 1
        //     ],
        //     [
        //         'title' => 'another title for post',
        //         'content' => 'Another some post content',
        //         'image' => 'post1.jpg',
        //         'likes' => 10,
        //         'is_published' => 0
        //     ]
        // ];

        // foreach($postsArr as $item){
        //     Post::create($item);
            
        // }

        // dd('created');
    }

    public function store(){
        $data = request()->validate([           //------НУЖНО ДЛЯ ОТПРАВКИ ДАННЫХ В БД ИЗ ФОРМЫ
            'title'=> 'required|string',
            'content'=> 'required|string',
            'image'=> 'required|string',
            'likes'=> 'required|int',
            'category_id'=> '',
            'tags'=> '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);
        $post = Post::create($data);

        // foreach($tags as $tag){
        //     TagPost::firstOrCreate([
        //         'tag_id'=> $tag,
        //         'post_id' => $post->id
        //     ]);
        // }
        $post->tags()->attach($tags);
        return redirect()->route('post.index');
    }

    public function show(Post $post){          //  ---------------НУЖНО ДЛЯ ПОКАЗА ОПРЕДЕЛЕННЫХ ДАННЫХ ИЗ БД
            return view('post.show', compact('post'));
    }

    public function edit(Post $post){     
        $categories = Category::all(); 
        $tags = Tag::all();
        return view('post.update', compact('post', 'categories', 'tags'));
    }

    public function update(Post $post){
        $data = request()->validate([           //------НУЖНО ДЛЯ ОТПРАВКИ ДАННЫХ В БД ИЗ ФОРМЫ
            'title'=> 'string',
            'content'=> 'string',
            'image'=> 'string',
            'likes'=> 'int',
            'category_id'=> 'string',
            'tags'=> '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);
        return redirect()->route('post.show', $post->id);
    }

    public function destroy(Post $post){
        $post->delete();
        return redirect()->route('post.index');
    }

    public function delete(){
        $post = Post::withTrashed()->find(2);
        $post->restore();
        dd('deleted');
    }

    public function firstOrCreate(){
        $post = Post::firstOrCreate([
            'title' => 'title for post 123'
        ], 
        [
            'title' => 'title for post 123',
            'content' => 'Some post content 123',
            'image' => 'post123.jpg',
            'likes' => 20123,
            'is_published' => 1
        ]);

        $anotherPost = [
            'title' => 'title for post 12345',
            'content' => 'Some post content 12345',
            'image' => 'post12345.jpg',
            'likes' => 2012345,
            'is_published' => 0
        ];
        dump($post->content);
        dd('finished');
    }
}
