<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AffiliatesTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('affiliates')->insert([
            'nom'      => 'Europ',
            'prenom'   => 'Cos',
            'tel'      => '',
            'email'    => 'admin@admin.com',
            'password' => sha1('hqgd1xJCp589jHEmjDEm0K1rZ1UuNFPwKhhfsDYgZJA=')
        ]);
    }
}
