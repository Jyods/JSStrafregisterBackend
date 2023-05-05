<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\File;
use App\Models\Member;
use App\Models\Entry;
use App\Models\User;

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

        //Entry and Member factory has File factory
        Entry::factory()->count(60)->create();
        User::factory()->count(30)->create();

        File::factory()
        ->count(200)
        ->create();

        /*Member::factory()
        ->count(30)
        ->has(File::factory()->count(2))
        ->create();*/
    }
}
