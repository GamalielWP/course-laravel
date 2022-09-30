<?php

use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            'member_id' => '1',
            'course_id' => '1',
            'mentor_id' => '1'
        ]);
        DB::table('courses')->insert([
            'member_id' => '2',
            'course_id' => '2',
            'mentor_id' => '1'
        ]);
        DB::table('courses')->insert([
            'member_id' => '3',
            'course_id' => '3',
            'mentor_id' => '2'
        ]);
        DB::table('courses')->insert([
            'member_id' => '4',
            'course_id' => '4',
            'mentor_id' => '3'
        ]);
        DB::table('courses')->insert([
            'member_id' => '5',
            'course_id' => '5',
            'mentor_id' => '4'
        ]);
        DB::table('courses')->insert([
            'member_id' => '6',
            'course_id' => '2',
            'mentor_id' => '1'
        ]);
        DB::table('courses')->insert([
            'member_id' => '2',
            'course_id' => '3',
            'mentor_id' => '2'
        ]);
        DB::table('courses')->insert([
            'member_id' => '7',
            'course_id' => '6',
            'mentor_id' => '5'
        ]);
        DB::table('courses')->insert([
            'member_id' => '2',
            'course_id' => '4',
            'mentor_id' => '3'
        ]);
        DB::table('courses')->insert([
            'member_id' => '4',
            'course_id' => '5',
            'mentor_id' => '4'
        ]);
    }
}
