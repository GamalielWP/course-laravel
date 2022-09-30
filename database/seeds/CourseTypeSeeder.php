<?php

use Illuminate\Database\Seeder;

class CourseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('course_types')->insert([
            'type' => 'C++'
        ]);
        DB::table('course_types')->insert([
            'type' => 'Python'
        ]);
        DB::table('course_types')->insert([
            'type' => 'JavaScript'
        ]);
        DB::table('course_types')->insert([
            'type' => 'Golang'
        ]);
        DB::table('course_types')->insert([
            'type' => 'PHP'
        ]);
        DB::table('course_types')->insert([
            'type' => 'HTML'
        ]);
    }
}
