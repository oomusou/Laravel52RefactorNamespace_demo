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

    /** @test */
    public function 顯示所有文章2()
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
            ->pick([
                'title',
                'description',
                'content'
            ])
            ->all();

        /** assert */
        $expected = [
            ['title1', 'desc1', 'content1'],
            ['title2', 'desc2', 'content2'],
            ['title3', 'desc3', 'content3'],
        ];

        $this->assertEquals($expected, $actual);
    }
}
