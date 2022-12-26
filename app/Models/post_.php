<?php

namespace App\Models;


class post
{
    private static $posts = [
        [
            'postTitle' => 'Haaah',
            'postSlug' => 'aa',
            'postContent' => 'waaaaa'
        ],
        [
            'postTitle' => 'oh',
            'postSlug' => 'bb',
            'postContent' => 'uuuuaaa'
        ]
    ];

    public static function all()
    {
        return self::$posts;
    }

    public static function find($slug)
    {
        $posts = self::$posts;
        $post = [];
        foreach ($posts as $p) {
            if ($p['postSlug'] == $slug) {
                $post = $p;
            }
        }
        return $post;
    }

    // public static function find($slug){
    //     $posts = post::all();

    //     $post = [];
    //     foreach($posts as $p){
    //         if($posts->postSlug == $slug){
    //             return $post = $p;
    //         }
    //     }
    //     return self::$posts;
    // }
}