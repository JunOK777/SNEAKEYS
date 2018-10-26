<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
          'tag_name' => 'NIKE'
        ];
        DB::table('tags')->insert($param);

        $param = [
          'tag_name' => 'adidas'
        ];
        DB::table('tags')->insert($param);

        $param = [
          'tag_name' => 'VANS'
        ];
        DB::table('tags')->insert($param);

        $param = [
          'tag_name' => 'CONVERSE'
        ];
        DB::table('tags')->insert($param);

        $param = [
          'tag_name' => 'puma'
        ];
        DB::table('tags')->insert($param);

        $param = [
          'tag_name' => 'other'
        ];
        DB::table('tags')->insert($param);
    }
}
