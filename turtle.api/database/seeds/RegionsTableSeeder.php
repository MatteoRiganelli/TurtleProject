<?php

use App\Model\Region;
use Illuminate\Database\Seeder;
//use Illuminate\Support\Facades\Hash;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $nations = [
            ['name' => 'EMPTY'],
            ['name' => 'Abruzzo'],
            ['name' => 'Basilicata'],
            ['name' => 'Calabria'],
            ['name' => 'Campania'],
            ['name' => 'Emilia Romagna'],
            ['name' => 'Friuli Venezia Giulia'],
            ['name' => 'Lazio'],
            ['name' => 'Liguria'],
            ['name' => 'Lombardia'],
            ['name' => 'Marche'],
            ['name' => 'Molise'],
            ['name' => 'Piemonte'],
            ['name' => 'Puglia'],
            ['name' => 'Sardegna'],
            ['name' => 'Sicilia'],
            ['name' => 'Toscana'],
            ['name' => 'Trentino Alto Adige'],
            ['name' => 'Umbria'],
            ['name' => 'Valle d\'Aosta'],
            ['name' => 'Veneto']
        ];

        foreach ($nations as $nation){
            Region::create($nation);
        }
    }
}
