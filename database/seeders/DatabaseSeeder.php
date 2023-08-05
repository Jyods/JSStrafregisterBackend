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
use App\Models\Institution;
use App\Models\Permission;

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

        //erstelle eine Variable mit einem Array voller Rang Objekten
        $ranks = [
            (object) [
                'rank' => 'Private',
                'kader' => 'Enlisted',
                'unit' => 'Clone Army',
            ],
            (object) [
                'rank' => 'Private First Class',
                'kader' => 'Enlisted',
                'unit' => 'Clone Army',
            ],
            (object) [
                'rank' => 'Specialist',
                'kader' => 'Enlisted',
                'unit' => 'Clone Army',
            ],
            (object) [
                'rank' => 'Lance Corporal',
                'kader' => 'Enlisted',
                'unit' => 'Clone Army',
            ],
            (object) [
                'rank' => 'Corporal',
                'kader' => 'Junior NCO',
                'unit' => 'Clone Army',
            ],
            (object) [
                'rank' => 'Sergeant',
                'kader' => 'Junior NCO',
                'unit' => 'Clone Army',
            ],
            (object) [
                'rank' => 'Staff Sergeant',
                'kader' => 'Junior NCO',
                'unit' => 'Clone Army',
            ],
            (object) [
                'rank' => 'Technical Sergeant',
                'kader' => 'Senior NCO',
                'unit' => 'Clone Army',
            ],
            (object) [
                'rank' => 'Master Sergeant',
                'kader' => 'Senior NCO',
                'unit' => 'Clone Army',
            ],
            (object) [
                'rank' => 'First Sergeant',
                'kader' => 'Senior NCO',
                'unit' => 'Clone Army',
            ],
            (object) [
                'rank' => 'Sergeant Major',
                'kader' => 'Senior NCO',
                'unit' => 'Clone Army',
            ],
            (object) [
                'rank' => '2nd Lieutenant',
                'kader' => 'Commissioned Officer',
                'unit' => 'Clone Army',
            ],
            (object) [
                'rank' => '1st Lieutenant',
                'kader' => 'Commissioned Officer',
                'unit' => 'Clone Army',
            ],
            (object) [
                'rank' => 'Captain',
                'kader' => 'Commissioned Officer',
                'unit' => 'Clone Army',
            ],
            (object) [
                'rank' => 'Major',
                'kader' => 'Commissioned Officer',
                'unit' => 'Clone Army',
            ],
            (object) [
                'rank' => 'Commander',
                'kader' => 'Commissioned Officer',
                'unit' => 'Clone Army',
            ],
            (object) [
                'rank' => 'Senior Commander',
                'kader' => 'Commissioned Officer',
                'unit' => 'Clone Army',
            ],
            (object) [
                'rank' => 'Marshal Commander',
                'kader' => 'Commissioned Officer',
                'unit' => 'Clone Army',
            ],
            (object) [
                'rank' => 'Colonel',
                'kader' => 'High Command',
                'unit' => 'Clone Army',
            ],
            (object) [
                'rank' => 'Crewman',
                'kader' => 'Enlisted',
                'unit' => 'Navy',
            ],
            (object) [
                'rank' => 'Petty Officer',
                'kader' => 'Enlisted',
                'unit' => 'Navy',
            ],
            (object) [
                'rank' => 'Chief Petty Officer',
                'kader' => 'Enlisted',
                'unit' => 'Navy',
            ],
            (object) [
                'rank' => 'Warrent Officer',
                'kader' => 'Junior NCO',
                'unit' => 'Navy',
            ],
            (object) [
                'rank' => 'Chief Warrent Officer',
                'kader' => 'Junior NCO',
                'unit' => 'Navy',
            ],
            (object) [
                'rank' => 'Ensign',
                'kader' => 'Junior NCO',
                'unit' => 'Navy',
            ],
            (object) [
                'rank' => 'Mindshipman',
                'kader' => 'Senior NCO',
                'unit' => 'Navy',
            ],
            (object) [
                'rank' => 'Lieutenant',
                'kader' => 'Senior NCO',
                'unit' => 'Navy',
            ],
            (object) [
                'rank' => 'Lieutenant Commander',
                'kader' => 'Senior NCO',
                'unit' => 'Navy',
            ],
            (object) [
                'rank' => 'Commander',
                'kader' => 'Commissioned Officer',
                'unit' => 'Navy',
            ],
            (object) [
                'rank' => 'Captain',
                'kader' => 'Commissioned Officer',
                'unit' => 'Navy',
            ],
            (object) [
                'rank' => 'Commodore',
                'kader' => 'Commissioned Officer',
                'unit' => 'Navy',
            ]
        ];

        $institutions = [
            (object) [
                'name' => 'Repulikanischer Senat',
                'description' => 'Der Republikanische Senat ist die Legislative der Galaktischen Republik. Er ist der Nachfolger des Galaktischen Senats der Alten Republik.',
                'abbreviation' => 'RS',
            ],
            (object) [
                'name' => 'Jedi Orden',
                'description' => 'Der Jedi-Orden ist eine religiöse Organisation, die sich der Macht verschrieben hat. Die Jedi sind die Hüter des Friedens und der Gerechtigkeit in der Galaxis.',
                'abbreviation' => 'JO',
            ],
            (object) [
                'name' => 'Republikanisches Zentrum für innere Sicherheit',
                'description' => 'Das Republikanische Zentrum für innere Sicherheit ist eine Organisation, die sich mit der inneren Sicherheit der Republik befasst.',
                'abbreviation' => 'RZIS',
            ],
            (object) [
                'name' => 'Republikanisches Zentrum für Inneres und Integrität',
                'description' => 'Das Republikanische Zentrum für Inneres und Integrität ist eine Organisation, die sich mit der inneren Sicherheit der Republik befasst.',
                'abbreviation' => 'RZII',
            ],
            (object) [
                'name' => 'Republikanisches Zentrum für Äußere Angelegenheiten',
                'description' => 'Das Republikanische Zentrum für Äußere Angelegenheiten ist eine Organisation, die sich mit der inneren Sicherheit der Republik befasst.',
                'abbreviation' => 'RZfA',
            ]
            ];

        //Create as much ranks as there are in the array
        foreach ($ranks as $rank) {
            Rank::factory()->create([
                'rank' => $rank->rank,
                'kader' => $rank->kader,
                'unit' => $rank->unit,
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
            'rank_id' => '15',
            'discord' => '821117158012354570',
            'permission_superadmin' => True,
        ]);

        User::factory()->create([
            'name' => 'Jyods',
            'email' => 'Jyods@test.com',
            'password' => bcrypt('password'),
            'identification' => 'Jyods',
            'restrictionClass' => '2',
            'isActive' => True,
            'rank_id' => '1',
            'discord' => '345665041477140490'
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

        foreach($institutions as $institution) {
            Institution::factory()->create([
                'name' => $institution->name,
                'description' => $institution->description,
                'abbreviation' => $institution->abbreviation,
            ]);
        }

        Permission::factory(10)->create();


        /*Member::factory()
        ->count(30)
        ->has(File::factory()->count(2))
        ->create();*/
    }
}
