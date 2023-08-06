<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    public function index() : void {
        $posts = Post::where('is_published', 1)->get();
        foreach ($posts as $post) {
            dump($post->title);
        }
        dd($posts);
    }

    public function create() : void {
        $postsArr = [
            [
                'title' => 'new_post',
                'content' => 'new content',
                'images' => 'img.jpg',
                'likes' => 20,
                'is_published' => 1,
            ],
            [
                'title' => 'another_new_post',
                'content' => 'another new content',
                'images' => 'another_img.jpg',
                'likes' => 20,
                'is_published' => 1,
            ],
        ];

        foreach ($postsArr as $post) {
            Post::create([
                'title' => $post['title'],
                'content' => $post['content'],
                'images' => $post['images'],
                'likes' => $post['likes'],
                'is_published' => $post['is_published'],
            ]);
        }
        

        dd('created');
    }

    public function update() : void {
        $post = Post::find(4);
        $post->update([
            'content' => 'updated content'
        ]);
        dd('updated');
    }

    public function delete() : void {

        $post = Post::find(2);
        $post->delete();
        dump('deleted');

        $post_trashed = Post::withTrashed()->find(2);
        $post_trashed->restore();
        dump('restored');

    }

    public function firstOrCreate() : void {
        dump('firstOrCreate');

        $anotherPost = [
            'title' => 'some post',
            'content' => 'some content',
            'images' => 'some_image.jpg',
            'likes' => 3000,
            'is_published' => 1,
        ];
        $post = Post::firstOrCreate([
            'title' => 'some post'
        ],[
            'title' => 'some post',
            'content' => 'some content',
            'images' => 'some_image.jpg',
            'likes' => 3000,
            'is_published' => 1,
        ]);
        dump($post->content);
        dd('done');
    }

    public function updateOrCreate() : void {
        dump('firstOrCreate');

        $anotherPost = [
            'title' => 'uoc some post',
            'content' => 'uoc some content',
            'images' => 'uoc some_image.jpg',
            'likes' => 300,
            'is_published' => 0,
        ];
        $post = Post::updateOrCreate([
            'title' => 'uoc some post'
        ],[
            'title' => 'uoc some post',
            'content' => 'uoc some content',
            'images' => 'uoc some_image.jpg',
            'likes' => 3000,
            'is_published' => 1,
        ]);
        dump($post->content);
        dd('done');
    }
}
