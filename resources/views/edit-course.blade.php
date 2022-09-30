@extends('template.base')

@section('content')
    
<div class="card">
    <div class="card-body">
        <form action="/edit-course/{{$course->id}}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group mb-3">
                <label for="member" class="form-label">Member</label>
                <select name="member" class="form-select" aria-label="Default select example">
                    @foreach ($member as $mb)
                        <option value="{{$mb->id}}" {{$mb->id == $course->member_id ? 'selected' : ''}}>{{$mb->member_name}}</option>
                    @endforeach
                </select>
            </div>
              <div class="form-group mb-3">
                <label for="course" class="form-label">Course</label>
                <select name="course" class="form-select" aria-label="Default select example">
                    @foreach ($type as $tp)
                        <option value="{{$tp->id}}" {{$tp->id == $course->course_id ? 'selected' : ''}}>{{$tp->name}}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group mb-3">
                <label for="mentor" class="form-label">Mentor</label>
                <select name="mentor" class="form-select" aria-label="Default select example">
                    @foreach ($mentor as $mt)
                        <option value="{{$mt->id}}" {{$mt->id == $course->mentor_id ? 'selected' : ''}}>{{$mt->mentor_name}}</option>
                    @endforeach
                </select>  
              </div>
              <div class="form-group mb-3">
                <a href="/">Batal</a>
                <button type="submit">Update</button>
                </select>  
              </div>
        </form>
    </div>     
</div>
@endsection