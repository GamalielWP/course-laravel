<?php

namespace App\Http\Controllers;

use App\Course;
use App\Member;
use App\Mentor;
use App\Type;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

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

        $allMember = Member::all();
        $allType = Type::all();
        $allMentor = Mentor::all();

        return view('courses', compact('course', 'golang', 'mentor', 'member', 'allMember', 'allType', 'allMentor'));
    }

    public function dataTable()
    {
        $course = Course::all();

        return Datatables::of($course)
            ->addIndexColumn()
            ->editColumn('member', function($course){
                return $course->member->member_name;
            })
            ->editColumn('course', function($course){
                return $course->type->name;
            })
            ->editColumn('mentor', function($course){
                return $course->mentor->mentor_name;
            })
            ->addColumn('action', function($course){
                $btn = '
                    <a class="btn btn-success btn-sm" href="/edit-index/'.$course->id.'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    |
                    <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteBackdrop"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                    <div class="modal fade" id="deleteBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteBackdropLabel">Peringatan !</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Anda yakin menghapus data ini ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <a href="/delete-course/'.$course->id.'" class="btn btn btn-danger">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        Hapus
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                ';

                return $btn;
            })
            ->rawColumns(['member', 'course', 'mentor', 'action'])
            ->make(true);
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
