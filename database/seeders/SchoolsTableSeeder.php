<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schools')->insert([

            ['school_name' => 'Worth School'],
            ['school_name' => 'St Helen & St Katharine School'],
            ['school_name' => 'Coloma Convent Girls School'],
            ['school_name' => 'Cranleigh School'],
            ['school_name' => 'Ipswich School'],
            ['school_name' => 'Francis Holland School'],
            ['school_name' => 'Lady Eleanor Holles School'],
            ['school_name' => "Sir William Perkins's School"],
            ['school_name' => 'Concord College'],
            ['school_name' => 'Brentwood School'],
            ['school_name' => 'John Lyon School'],
            ['school_name' => "Haberdashers' Aske's School for Girls"],
            ['school_name' => 'Mill Hill School'],
            ['school_name' => 'Liverpool College'],
            ['school_name' => 'Wrekin College'],
            ['school_name' => 'Westcliff High School for Girls'],
            ['school_name' => 'Bishop Stortford College']

        ]);
    }
}
