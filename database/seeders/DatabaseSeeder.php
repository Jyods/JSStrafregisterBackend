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
        $laws = [
            (object) [
                "Title" => "Beleidigung",
                "Category" => "1",
                "Severity" => "High",
                "ShortDescription" => "Ein Angriff auf die Person durch verbale Worten oder Taten wird als Beleidigung gezählt.",
                "Description" => "Die Aussagen einer Person werden nach Ermessen der Exekutive behandelt.",
                "minJail" => 0,
                "maxJail" => 10
            ],
            (object) [
                "Title" => "Respektlosigkeit",
                "Category" => "1",
                "Severity" => "High",
                "ShortDescription" => "Eine Respektlosigkeit oder Untergraben des Respekts einer Person kann von der Exekutive als Beleidigung deklariert werden.",
                "Description" => "Die Maximale Strafe beläuft sich auf: 10 Hafteinheiten",
                "minJail" => 0,
                "maxJail" => 10
            ],
            (object) [
                "Title" => "Leichter Diebstahl",
                "Category" => "1",
                "Severity" => "Medium",
                "ShortDescription" => "Ein leichter Diebstahl beläuft sich auf ein sehr geringes Entwenden einer nicht wichtigen Ressource.",
                "Description" => "Die Maximale Strafe beläuft sich auf: 10 Hafteinheiten",
                "minJail" => 0,
                "maxJail" => 10
            ],
            (object) [
                "Title" => "Undiszipliniertes Verhalten",
                "Category" => "1",
                "Severity" => "High",
                "ShortDescription" => "Als Undiszipliniertes Verhalten zählt unter anderem die Respektlosigkeit gegenüber Nieder- / Gleich- und Höherrangigen oder ein falsches Verhalten zeigen.",
                "Description" => "Die Maximale Strafe beläuft sich auf: Zur Grundausbildung auf Kamino schicken oder Haftzeit: 10 Hafteinheiten",
                "minJail" => 0,
                "maxJail" => 10
            ],
            (object) [
                "Title" => "Verstoß gegen Sicherheitslevel",
                "Category" => "1",
                "Severity" => "High",
                "ShortDescription" => "Ein Verstoß gegen das Sicherheitslevel bezeichnet das Betreten einer Anlage bzw. eines Bereiches mit einem höheren Sicherheitslevel als das Eigene.",
                "Description" => "Die Maximale Strafe beläuft sich auf: 15 Hafteinheiten",
                "minJail" => 0,
                "maxJail" => 15
            ],
            (object) [
                "Title" => "Entziehung vor Sanktionen",
                "Category" => "2",
                "Severity" => "High",
                "ShortDescription" => "Wer sich seiner Sanktion entzieht, als Beispiel: Bußgeld wissentlich nicht bezahlen oder das Shuttle nach Kamino trotz Auflage nicht nehmen, macht sich strafbar.",
                "Description" => "Die Maximale Strafe beläuft sich auf: 20 Hafteinheiten",
                "minJail" => 0,
                "maxJail" => 20
            ],
            (object) [
                "Title" => "Schwerer Diebstahl",
                "Category" => "2",
                "Severity" => "High",
                "ShortDescription" => "Schwerer Diebstahl bezeichnet das Entwenden von großen, vielen und/oder wichtigen Ressourcen.",
                "Description" => "Beispiel: Das Entwenden eines schweren Ionen Disruptors aus der Waffenkammer.\nDie Maximale Strafe beläuft sich auf: 20 Hafteinheiten",
                "minJail" => 0,
                "maxJail" => 20
            ],
            (object) [
                "Title" => "Belästigung",
                "Category" => "2",
                "Severity" => "High",
                "ShortDescription" => "Das Belästigen von Personen oder Personengruppen kann auch als undiszipliniertes Verhalten angesehen werden.",
                "Description" => "Als Belästigung wird das stören oder nerven von Personen genannt.\nDie Maximale Strafe beläuft sich auf: 20 Hafteinheiten",
                "minJail" => 0,
                "maxJail" => 20
            ],
            (object) [
                "Title" => "Verstoß der Start- / Landeerlaubnis Richtlinien",
                "Category" => "2",
                "Severity" => "High",
                "ShortDescription" => "Die Richtlinie besagt dass: “Zu startende oder landende Personen müssen ihr Anliegen erst anfragen bevor sie zum Start bzw. zur Landung ansetzen.",
                "Description" => "Dabei wird ihnen ein Flugplatz zugewiesen, den sie benutzen können. Sollte keine solche Anfrage erfolgen, können Konsequenzen je nach Schweregrad bis zur Zerstörung des Fahrzeuges folgen.\nDie Maximale Strafe beläuft sich auf: 30 Hafteinheiten",
                "minJail" => 0,
                "maxJail" => 30
            ],
            (object) [
                "Title" => "Unbefugtes Benutzen einer Ressource",
                "Category" => "2",
                "Severity" => "High",
                "ShortDescription" => "Das unbefugte benutzen einer Ressource bezeichnet das benutzen einer Ressource wie z.B. das benutzen eines AT-TE ohne Erlaubnis oder Ausbildung.",
                "Description" => "Die Maximale Strafe beläuft sich auf: 25 Hafteinheiten, Entzug aus jeglichen Fortbildungen für Fahrzeuge",
                "minJail" => 0,
                "maxJail" => 25
            ],
            (object) [
                "Title" => "Widerstand gegen die Exekutive",
                "Category" => "2",
                "Severity" => "High",
                "ShortDescription" => "Als Widerstand gegen die Exekutive ist das Nichtbefolgen der Anweisungen der Exekutiven Kraft oder das Aktive zur Wehr setzen gegen natürliche oder juristische Personen der Exekutiven Kraft gemeint.",
                "Description" => "Die Maximale Strafe beläuft sich auf: 20 Hafteinheiten",
                "minJail" => 0,
                "maxJail" => 20
            ],
            (object) [
                "Title" => "Behinderung der Notfall Kräfte",
                "Category" => "2",
                "Severity" => "High",
                "ShortDescription" => "Notfall Kräfte, die aktiv oder passiv von Personen behindert werden, können Maßnahmen gegebenenfalls verzögern.",
                "Description" => "Der Fall stellt eine Straftat dar.\nDie Maximale Strafe beläuft sich auf: 20 Hafteinheiten",
                "minJail" => 0,
                "maxJail" => 20
            ],
        ];

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

        foreach ($laws as $law) {
            Law::factory()->create([
                'Title' => $law->Title,
                'Category' => $law->Category,
                'Severity' => $law->Severity,
                'ShortDescription' => $law->ShortDescription,
                'Description' => $law->Description,
                'minJail' => $law->minJail,
                'maxJail' => $law->maxJail,
            ]);
        }

        //Law::factory(20)->create();

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
