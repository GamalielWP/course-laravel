<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'member_id', 'course_id', 'mentor_id'
    ];

    public function member()
    {
        return $this->belongsTo('App\Member');
    }
    public function course_type()
    {
        return $this->belongsTo('App\CourseType');
    }
    public function mentor()
    {
        return $this->belongsTo('App\Mentor');
    }
}
