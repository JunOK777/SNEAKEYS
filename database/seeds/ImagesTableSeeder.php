<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
          'user_id' => 1,
          'image_file_name' => 'AIR_FOOTSCAPE.jpg',
          'item_name' => 'AIR_FOOTSCAPE',
          'brand_name' => 'NIKE',
        ];
        DB::table('images')->insert($param);

        $param = [
          'user_id' => 1,
          'image_file_name' => 'Air_Jordan_1.jpg',
          'item_name' => 'Air_Jordan_1',
          'brand_name' => 'NIKE',
        ];
        DB::table('images')->insert($param);

        $param = [
          'user_id' => 1,
          'image_file_name' => 'AIR_JORDAN_6.jpg',
          'item_name' => 'AIR_JORDAN_6',
          'brand_name' => 'NIKE',
        ];
        DB::table('images')->insert($param);

        $param = [
          'user_id' => 1,
          'image_file_name' => 'Air_Jordan_4.jpg',
          'item_name' => 'AIR_JORDAN_6',
          'brand_name' => 'NIKE',
        ];
        DB::table('images')->insert($param);
    }
}
