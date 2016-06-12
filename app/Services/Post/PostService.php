<?php

namespace App\Services\Post;

use App\Repositories\Post\PostRepository;
use Illuminate\Database\Eloquent\Collection;

class PostService
{
    /**
     * @var PostRepository
     */
    private $postRepository;

    /**
     * PostService constructor.
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }


    /**
     * @return Collection
     */
    public function displayAllPosts() : Collection
    {
        return $this->postRepository->getAllPosts();
    }
}