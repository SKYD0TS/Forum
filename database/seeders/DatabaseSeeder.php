<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\post;
use App\Models\user;
use App\Models\category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        //     user::create([
        //         'name' => 'THX',
        //         'email' => 'THX5L@gmail.com',
        //         'password' => bcrypt('thxpassword')
        //     ]);
        //     user::create([
        //         'name' => 'seanDenial',
        //         'email' => 'SDENIAL@gmail.com',
        //         'password' => bcrypt('sdpassword')
        //     ]);

        user::factory(4)->create();

        category::create([
            'name' => 'the',
            'slug' => 'theCat'
        ]);
        category::create([
            'name' => 'hex',
            'slug' => 'hexCat'
        ]);

        post::factory(30)->create();



        //     post::create([
        //         'title' => 'title the 1st The',
        //         'content' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Praesentium voluptatum eius at maxime labore sunt omnis voluptate asperiores, provident animi tempore adipisci, inventore exercitationem architecto cupiditate deserunt corrupti excepturi officiis eveniet vitae sint non!',
        //         'slug' => 'title1',
        //         'category_id' => 1,
        //         'user_id' => 1
        //     ]);
        //     post::create([
        //         'title' => 'title 2nd HEX',
        //         'content' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Praesentium voluptatum eius at maxime labore sunt omnis voluptate asperiores, provident animi tempore adipisci, inventore exercitationem architecto cupiditate deserunt corrupti excepturi officiis eveniet vitae sint non!',
        //         'slug' => 'title1',
        //         'category_id' => 2,
        //         'user_id' => 2
        //     ]);
        //     post::create([
        //         'title' => 'title 3rd HEX',
        //         'content' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Praesentium voluptatum eius at maxime labore sunt omnis voluptate asperiores, provident animi tempore adipisci, inventore exercitationem architecto cupiditate deserunt corrupti excepturi officiis eveniet vitae sint non!',
        //         'slug' => 'title1',
        //         'category_id' => 2,
        //         'user_id' => 1
        //     ]);
        // 
    }
}