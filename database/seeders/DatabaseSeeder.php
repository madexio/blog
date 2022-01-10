<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            "name"=>"Matthew Proulx",
            "username"=>"Oixedam"
        ]);
        Post::factory(15)->create([
            "user_id"=>$user->id
        ]);
        $user = User::factory()->create([
            "name"=>"Megan Ellis",
            "username"=>"ClaretRose"
        ]);
        Post::factory(15)->create([
            "user_id"=>$user->id
        ]);
    }
}
