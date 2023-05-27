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
use App\Models\Rank;

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

        $ranks = ["Private","Corporal","Sergeant","Lieutenant","Captain","Major","Colonel","General","Commander","Marshal","Supreme Commander","High General","Commander-in-Chief","High Marshal","High General","High Commander"];

        //Create as much ranks as there are in the array
        foreach ($ranks as $rank) {
            Rank::factory()->create([
                'rank' => $rank,
            ]);
        }

        //Create first User with Password
        User::factory()->create([
            'name' => 'CT-6659',
            'email' => 'test@test.com',
            'password' => bcrypt('password'),
            'identification' => 'CT-6659',
            'restrictionClass' => '10',
            'isActive' => True,
            'rank_id' => '15'
        ]);

        User::factory()->create([
            'name' => 'Jyods',
            'email' => 'Jyods@test.com',
            'password' => bcrypt('password'),
            'identification' => 'Jyods',
            'restrictionClass' => '2',
            'isActive' => True,
            'rank_id' => '1'
        ]);

        //Entry and Member factory has File factory
        Entry::factory()->count(20)->create();
        User::factory()->count(5)->create();

        File::factory()
        ->count(50)
        ->create();

        Law::factory(20)->create();

        FileLaw::factory()
        ->count(100)
        ->create();

        


        /*Member::factory()
        ->count(30)
        ->has(File::factory()->count(2))
        ->create();*/
    }
}
