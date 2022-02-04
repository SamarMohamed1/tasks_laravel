<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Prophecy\Call\Call;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       for($i=0 ;$i<50 ;$i++ ){
           Post::insert([
            'title' =>$slug=Str::random(10),
            'description' =>Str::random(50),
            'created_at' =>now(),
            'updated_at'=>now(),
            'user_id' =>User::all()->random()->id,
            
           ]);
       }

    }
}
