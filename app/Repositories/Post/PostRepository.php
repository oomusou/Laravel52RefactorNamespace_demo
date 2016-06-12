<?php

namespace App\Repositories\Post;

use App\Post;
use Illuminate\Database\Eloquent\Collection;

class PostRepository
{
    /**
     * @return Collection
     */
    public function getAllPosts() : Collection
    {
        return Post::all();
    }

}