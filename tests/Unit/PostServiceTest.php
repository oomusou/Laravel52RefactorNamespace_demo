<?php

use App\Post;
use App\Services\Post\PostService;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PostServiceTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function 顯示所有文章1()
    {
        /** arrange */
        collect(range(1, 3))->each(function ($value) {
            Post::create([
                'title'       => "title{$value}",
                'description' => "desc{$value}",
                'content'     => "content{$value}"
            ]);
        });

        /** act */
        $actual = app(PostService::class)
            ->displayAllPosts()
            ->toArray();

        /** assert */
        $expected = [
            ['title' => 'title1', 'description' => 'desc1', 'content' => 'content1'],
            ['title' => 'title2', 'description' => 'desc2', 'content' => 'content2'],
            ['title' => 'title3', 'description' => 'desc3', 'content' => 'content3'],
        ];
        $this->assertArraySubset($expected, $actual);
    }
}
