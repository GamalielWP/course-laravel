@extends('template.base')

@section('content')
    
<div class="center">
    <div class="card shadow card-widht">
        <div class="card-header bg-primary">
            <span class="text-white">Add Course</span>
        </div>
        <div class="card-body">
            <form action="/add-course" method="post">
                @csrf
                @method('POST')
                <div class="form-group mb-3">
                    <label for="member" class="form-label">Member</label>
                    <select name="member" class="form-select" aria-label="Default select example">
                        @foreach ($member as $mb)
                            <option value="{{$mb->id}}">{{$mb->member_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="course" class="form-label">Course</label>
                    <select name="course" class="form-select" aria-label="Default select example">
                        @foreach ($type as $tp)
                            <option value="{{$tp->id}}">{{$tp->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="mentor" class="form-label">Mentor</label>
                    <select name="mentor" class="form-select" aria-label="Default select example">
                        @foreach ($mentor as $mt)
                            <option value="{{$mt->id}}">{{$mt->mentor_name}}</option>
                        @endforeach
                    </select>  
                </div>
                <div class="form-group mb-3">
                    <a class="btn btn-secondary" href="/">Batal</a>
                    <button class="btn btn-success float-right" type="submit">
                        Tambahkan
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </button>
                </div>
            </form>
        </div>     
    </div>
</div>

@endsection