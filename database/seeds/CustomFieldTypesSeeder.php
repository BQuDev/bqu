<?php

use Illuminate\Database\Seeder;

class CustomFieldTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('custom_field_types')->truncate();
        DB::table('custom_field_types')->insert(array('name' => 'text','type' =>'text'));
        DB::table('custom_field_types')->insert(array('name' => 'text','type' =>'password'));
        DB::table('custom_field_types')->insert(array('name' => 'text','type' =>'radio'));
        DB::table('custom_field_types')->insert(array('name' => 'text','type' =>'checkbox'));
    }
}
