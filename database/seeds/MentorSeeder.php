<?php

use Illuminate\Database\Seeder;

class MentorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Mentors')->insert([
            'mentor_name' => 'Ahmad'
        ]);
        DB::table('Mentors')->insert([
            'mentor_name' => 'Budi'
        ]);
        DB::table('Mentors')->insert([
            'mentor_name' => 'Rahmad'
        ]);
        DB::table('Mentors')->insert([
            'mentor_name' => 'Dian'
        ]);
        DB::table('Mentors')->insert([
            'mentor_name' => 'Galuh'
        ]);
    }
}
