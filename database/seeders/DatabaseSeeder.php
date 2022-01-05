<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;
use \App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Category::truncate();
        Post::truncate();
        $user = User::factory()->create();
        $personal = Category::create([
            "name" => "Personal",
            "slug" => "personal",
        ]);
        $family = Category::create([
            "name" => "Family",
            "slug" => "family",
        ]);
        $work = Category::create([
            "name" => "Work",
            "slug" => "work",
        ]);
        Post::create([
            "category_id" => $personal->id,
            "user_id"     => $user->id,
            "slug"        => "my-personal-post",
            "title"       => "My Personal Post",
            "excerpt"     => "Lorem ipsum dolor sit amet, consectetur adipiscing elit",
            "body"        => "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. A erat nam at lectus. Vitae aliquet nec ullamcorper sit. Egestas egestas fringilla phasellus faucibus scelerisque eleifend donec. Malesuada fames ac turpis egestas. Volutpat est velit egestas dui id ornare. Sed viverra tellus in hac habitasse platea dictumst vestibulum. Pretium viverra suspendisse potenti nullam. Nisi lacus sed viverra tellus in hac habitasse. Rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar. Sit amet aliquam id diam maecenas ultricies. Pulvinar pellentesque habitant morbi tristique senectus.</p>",
        ]);
        Post::create([
            "category_id" => $family->id,
            "user_id"     => $user->id,
            "slug"        => "my-family-post",
            "title"       => "My Family Post",
            "excerpt"     => "Dis parturient montes nascetur ridiculus",
            "body"        => "<p>Dis parturient montes nascetur ridiculus. Vitae suscipit tellus mauris a. Lorem ipsum dolor sit amet consectetur adipiscing. Sodales ut etiam sit amet nisl purus in mollis nunc. Turpis egestas pretium aenean pharetra magna ac placerat. Posuere sollicitudin aliquam ultrices sagittis orci. Sed vulputate odio ut enim. In vitae turpis massa sed. Malesuada fames ac turpis egestas sed tempus. Porttitor eget dolor morbi non arcu. Eget sit amet tellus cras adipiscing enim eu. Bibendum at varius vel pharetra. Praesent semper feugiat nibh sed pulvinar proin gravida. Id aliquet risus feugiat in.</p>",
        ]);
        Post::create([
            "category_id" => $work->id,
            "user_id"     => $user->id,
            "slug"        => "my-work-post",
            "title"       => "My Work Post",
            "excerpt"     => "Convallis a cras semper auctor neque vitae tempus quam",
            "body"        => "<p>Convallis a cras semper auctor neque vitae tempus quam. Varius duis at consectetur lorem donec. Molestie ac feugiat sed lectus vestibulum mattis ullamcorper velit sed. Enim ut tellus elementum sagittis vitae et leo. Tristique senectus et netus et malesuada fames ac turpis. Suscipit tellus mauris a diam maecenas sed. Diam in arcu cursus euismod quis viverra. Volutpat lacus laoreet non curabitur gravida arcu ac. Mauris in aliquam sem fringilla ut morbi tincidunt augue. Et tortor consequat id porta nibh venenatis.</p>",
        ]);
    }
}
