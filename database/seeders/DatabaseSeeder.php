<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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
        // php artisan migrate:fresh --seed
        //php artisan db:seed
        User::truncate();
        Category::truncate();
        Post::truncate();
        $user = User::factory()->create();
        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);
        $family = Category::create([
            'name' => 'Family',
            'slug' => 'family',
        ]);
        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work',
        ]);
        Post::create([
            'user_id' => $user->id,
            'category_id' => $family->id,
            'title' => 'My Family Post',
            'slug' => 'family',
            'excerpt' => 'dskldsdfkh dkf dhfkdh kdsf',
            'body' => '<p>dfkdjk sdfk  dsfk dfksd kd hksdf</p>'
        ]);
        Post::create([
            'user_id' => $user->id,
            'category_id' => $work->id,
            'title' => 'My Work Post',
            'slug' => 'work',
            'excerpt' => 'dskldsdfkh dkf dhfkdh kdsf',
            'body' => '<p>dfkdjk sdfk  dsfk dfksd kd hksdf</p>'
        ]);
        Post::create([
            'user_id' => $user->id,
            'category_id' => $personal->id,
            'title' => 'My Personal Post',
            'slug' => 'personal',
            'excerpt' => 'dskldsdfkh dkf dhfkdh kdsf',
            'body' => '<p>dfkdjk sdfk  dsfk dfksd kd hksdf</p>'
        ]);
    }
}
