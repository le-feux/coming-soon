<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'libelle' => 'default'
        ]);
        DB::table('tags')->insert([
            'libelle' => 'new'
        ]);
        DB::table('tags')->insert([
            'libelle' => 'promotion'
        ]);
        DB::table('tags')->insert([
            'libelle' => 'top-ventes'
        ]);
        DB::table('tags')->insert([
            'libelle' => 'black-friday'
        ]);
    }
}
