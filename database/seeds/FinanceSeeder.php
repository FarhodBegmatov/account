<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FinanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
          [
              'tip_id' => 1,
              'category_id' => 1,
              'date' => '07.06.2021',
              'summa' => 5000000,
              'overall' => 5000000,
              'comment' => 'Первая зарплата'
          ],
          [
              'tip_id' => 2,
              'category_id' => 6,
              'date' => '08.06.2021',
              'summa' => 150000,
              'overall' => 150000,
              'comment' => 'Turon Telecom'
          ]
        ];

        DB::table('finances')->insert($data);
    }
}
