@extends('template.base')

@section('content')
    
<div class="card">
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
                <a href="/">Batal</a>
                <button type="submit">Tambahkan</button>
                </select>  
              </div>
        </form>
    </div>     
</div>
@endsection