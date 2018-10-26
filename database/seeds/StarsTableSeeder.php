<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
          'star_number' => 'five',
          'stars' => '★★★★★',
        ];
        DB::table('stars')->insert($param);

        $param = [
          'star_number' => 'four',
          'stars' => '★★★★☆',
        ];
        DB::table('stars')->insert($param);

        $param = [
          'star_number' => 'three',
          'stars' => '★★★☆☆',
        ];
        DB::table('stars')->insert($param);

        $param = [
          'star_number' => 'two',
          'stars' => '★★☆☆☆',
        ];
        DB::table('stars')->insert($param);

        $param = [
          'star_number' => 'one',
          'stars' => '★☆☆☆☆',
        ];
        DB::table('stars')->insert($param);

        $param = [
          'star_number' => 'zero',
          'stars' => '☆☆☆☆☆',
        ];
        DB::table('stars')->insert($param);
    }
}
