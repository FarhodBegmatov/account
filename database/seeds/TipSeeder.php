<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'доход'],
            ['name' => 'расход']
        ];

        DB::table('tips')->insert($data);
    }
}
