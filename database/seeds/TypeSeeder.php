<?php

use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            'name' => 'C++'
        ]);
        DB::table('types')->insert([
            'name' => 'Python'
        ]);
        DB::table('types')->insert([
            'name' => 'JavaScript'
        ]);
        DB::table('types')->insert([
            'name' => 'Golang'
        ]);
        DB::table('types')->insert([
            'name' => 'PHP'
        ]);
        DB::table('types')->insert([
            'name' => 'HTML'
        ]);
    }
}
