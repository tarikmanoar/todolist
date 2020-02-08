<?php

use App\Models\Todo;
use App\Post;
use App\User;
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
        // $this->call(UsersTableSeeder::class);
        factory(User::class,25)->create();
        factory(Todo::class,50)->create();
        factory(Post::class,500)->create();
    }
}
