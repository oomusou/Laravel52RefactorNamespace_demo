<?php

use App\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PostApplicationTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function 顯示所有文章()
    {
        /** arrange */
        $expected = [
            ['title' => 'title1', 'description' => 'desc1', 'content' => 'content1'],
            ['title' => 'title2', 'description' => 'desc2', 'content' => 'content2'],
            ['title' => 'title3', 'description' => 'desc3', 'content' => 'content3'],
        ];

        collect($expected)->each(function ($value) {
            Post::create($value);
        });

        /** act */
        $this->visit('/post');

        /** assert */
        collect($expected)->each(function ($value) {
            $this->see($value['title']);
            $this->see($value['description']);
            $this->see($value['content']);
        });
    }
}
