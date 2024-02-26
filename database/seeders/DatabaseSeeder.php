<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Blog;
use App\Models\Classroom;
use App\Models\User;
use App\Models\Event;
use App\Models\Tournament;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(5)->create();

        $user = User::factory()->create([
            'name' => 'Lakyar',
            'email' => 'lakyar@gmail.com',
            'password' => 'lakyar1234',
            'role' => 'admin',
            'note' => "If the way to what you want seems too easy, then you're on the wrong path",
        ]);

        Blog::factory(10)->create([
            'user_id' => $user->id
        ]);
        Event::factory(10)->create([
            'user_id' => $user->id
        ]);
        Tournament::factory(15)->create([
            'user_id' => $user->id
        ]);
    }
}
