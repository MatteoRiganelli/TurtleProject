<?php

use App\Model\City;
use Illuminate\Database\Seeder;

//use Illuminate\Support\Facades\Hash;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            //ABRUZZO
            ['name' => 'EMPTY', 'province_id' => 'EMPTY', 'region_id' => 2],
        ];

        foreach ($cities as $city) {
            $provinceId = DB::table('province')->where('name', $city['province_id'])->value('id');
            $city['province_id'] = $provinceId;
            City::create($city);
        }
    }
}
