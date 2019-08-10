<?php

use App\Model\Nation;
use Illuminate\Database\Seeder;
//use Illuminate\Support\Facades\Hash;

class NationsTableSeeder extends Seeder
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
            'name' => 'EMPTY',
            'code' => '000'
        ];

        Nation::create($nations);
    }
}
