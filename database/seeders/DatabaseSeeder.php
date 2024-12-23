<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // \App\Models\Chat::create([
        //     'id' => 1
        // ]);
        // \App\Models\ChatMember::create([
        //     'chat_id' => 1,
        //     'user_id' => 1
        // ]);
        // \App\Models\ChatMember::create([
        //     'chat_id' => 1,
        //     'user_id' => 2
        // ]);

        \App\Models\ChatMessage::create([
            'chat_id' => 1,
            'user_id' => 0,
            'content' => 'system message'
        ]);

    }
}
