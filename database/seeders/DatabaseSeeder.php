<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\File;
use App\Models\Member;
use App\Models\Entry;
use App\Models\User;
use App\Models\Law;
use App\Models\FileLaw;

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

        //Create first User with Password
        User::factory()->create([
            'name' => 'CT-6659',
            'email' => 'test@test.com',
            'password' => bcrypt('password'),
            'identification' => 'CT-6659',
            'age' => '30',
            'restrictionClass' => '10',
            'isActive' => True,
        ]);

        User::factory()->create([
            'name' => 'Jyods',
            'email' => 'Jyods@test.com',
            'password' => bcrypt('password'),
            'identification' => 'Jyods',
            'age' => '17',
            'restrictionClass' => '2',
            'isActive' => True,
        ]);

        //Entry and Member factory has File factory
        Entry::factory()->count(60)->create();
        User::factory()->count(30)->create();

        File::factory()
        ->count(200)
        ->create();

        Law::factory(30)->create();

        FileLaw::factory()
        ->count(200)
        ->create();

        /*Member::factory()
        ->count(30)
        ->has(File::factory()->count(2))
        ->create();*/
    }
}
