<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post; // Assuming you have a Post model

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => bcrypt('password'),
        ]);

        Post::create([
            'title' => 'My First Post',
            'body' => 'This is the content of my first post.',
            'user_id' => $user->id, // Associate the post with the user
        ]);
    }
}
