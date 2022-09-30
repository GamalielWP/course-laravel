<?php

namespace App\Http\Controllers;

use App\Course;
use App\Member;
use App\Mentor;
use App\Type;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $course = Course::all();

        $type = Type::where('name', 'Golang')->first();
        $golang = Course::where('course_id', $type->id)->count();

        $max_mentor = Mentor::max('total_course');
        $mentor = Mentor::where('total_course', $max_mentor)->get();

        $max_member = member::max('total_course');
        $member = member::where('total_course', $max_member)->get();

        return view('courses', compact('course', 'golang', 'mentor', 'member'));
    }

    public function countMentor()
    {
        $course = Course::all();

        foreach ($course as $mt) {
            $max_mentor = Course::where('mentor_id', $mt->mentor_id)->count();
            Mentor::where('id', $mt->mentor_id)->update([
                'total_course' => $max_mentor
            ]);
        }

        return redirect('/');
    }

    public function countMember()
    {
        $course = Course::all();

        foreach ($course as $mb) {
            $max_member = Course::where('member_id', $mb->member_id)->count();
            Member::where('id', $mb->member_id)->update([
                'total_course' => $max_member
            ]);
        }

        return redirect('/');
    }

    public function addIndex()
    {
        $member = Member::all();
        $type = Type::all();
        $mentor = Mentor::all();
        return view ('add-course', compact('member', 'type', 'mentor'));
    }

    public function createCourse(Request $request)
    {
        Course::create([
            'member_id' => $request->member,
            'course_id' => $request->course,
            'mentor_id' => $request->mentor
        ]);

        return redirect('/');
    }

    public function editIndex($id)
    {
        $course = Course::findOrFail($id);
        $member = Member::all();
        $type = Type::all();
        $mentor = Mentor::all();

        return view ('edit-course', compact('member', 'type', 'mentor', 'course'));
    }

    public function editCourse(Request $request, $id)
    {
        Course::findOrFail($id)->update([
            'member_id' => $request->member,
            'course_id' => $request->course,
            'mentor_id' => $request->mentor
        ]);

        return redirect('/');
    }

    public function deleteCourse($id)
    {
        Course::findOrFail($id)->delete();

        return redirect('/');
    }
}
