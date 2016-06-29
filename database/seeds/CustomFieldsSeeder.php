<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomFieldsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('custom_fields')->truncate();
        DB::table('custom_fields')->insert(array('name' => 'text','type' =>'text'));
        DB::table('custom_fields')->insert(array('name' => 'text','type' =>'password'));
        DB::table('custom_fields')->insert(array('name' => 'text','type' =>'radio'));
        DB::table('custom_fields')->insert(array('name' => 'text','type' =>'checkbox'));
    }
}
