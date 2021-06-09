<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
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
                'category_name' => 'Заработная плата',
                'created_at' => '07.06.2021',
                'updated_at' => '08.06.2021'
            ],
            [
                'tip_id' => 1,
                'category_name' => 'Иные доходы',
                'created_at' => '07.06.2021',
                'updated_at' => '08.06.2021'
            ],
            [
                'tip_id' => 1,
                'category_name' => 'Сдача в аренду',
                'created_at' => '07.06.2021',
                'updated_at' => '08.06.2021'
            ],
            [
                'tip_id' => 2,
                'category_name' => 'Питание',
                'created_at' => '07.06.2021',
                'updated_at' => '08.06.2021'
            ],
            [
                'tip_id' => 2,
                'category_name' => 'Мобильная связь',
                'created_at' => '07.06.2021',
                'updated_at' => '08.06.2021'
            ],
            [
                'tip_id' => 2,
                'category_name' => 'Интернет',
                'created_at' => '07.06.2021',
                'updated_at' => '08.06.2021'
            ],
            [
                'tip_id' => 2,
                'category_name' => 'Транспорт',
                'created_at' => '07.06.2021',
                'updated_at' => '08.06.2021'
            ],
            [
                'tip_id' => 2,
                'category_name' => 'Развлечения',
                'created_at' => '07.06.2021',
                'updated_at' => '08.06.2021'
            ],
            [
                'tip_id' => 2,
                'category_name' => 'Другое',
                'created_at' => '07.06.2021',
                'updated_at' => '08.06.2021'
            ]
        ];

        DB::table('categories')->insert($data);
    }
}
