<?php

use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('members')->insert([
            'member_name' => 'Andi'
        ]);
        DB::table('members')->insert([
            'member_name' => 'Maulana'
        ]);
        DB::table('members')->insert([
            'member_name' => 'Yusuf'
        ]);
        DB::table('members')->insert([
            'member_name' => 'Mukhlis'
        ]);
        DB::table('members')->insert([
            'member_name' => 'Nova'
        ]);
        DB::table('members')->insert([
            'member_name' => 'Santi'
        ]);
        DB::table('members')->insert([
            'member_name' => 'Rifai'
        ]);
    }
}
