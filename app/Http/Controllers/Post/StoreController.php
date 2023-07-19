<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;


class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request) {
        $data = $request->validated();

        $this->service->store($data);
        // foreach($tags as $tag){
        //     TagPost::firstOrCreate([
        //         'tag_id'=> $tag,
        //         'post_id' => $post->id
        //     ]);
        // }
        return redirect()->route('post.index');
    }
}