@extends('template.base')

@section('content')

    <div class="card mb-4 shadow">
        <div class="card-body">
            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBackdrop">
                Tambah Course
                <i class="fa fa-user-plus" aria-hidden="true"></i>
            </a>
            <div class="table-responsive mb-4 mt-2">
                <table class="table" id="data-tabel">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Member Name</th>
                        <th scope="col">Course</th>
                        <th scope="col">Mentor</th>
                        <th scope="col">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBackdropLabel">Add Course</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/add-course" method="post">
                    @csrf
                    @method('POST')
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="member" class="form-label">Member</label>
                            <select name="member" class="form-select" aria-label="Default select example">
                                @foreach ($allMember as $mb)
                                    <option value="{{$mb->id}}">{{$mb->member_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="course" class="form-label">Course</label>
                            <select name="course" class="form-select" aria-label="Default select example">
                                @foreach ($allType as $tp)
                                    <option value="{{$tp->id}}">{{$tp->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="mentor" class="form-label">Mentor</label>
                            <select name="mentor" class="form-select" aria-label="Default select example">
                                @foreach ($allMentor as $mt)
                                    <option value="{{$mt->id}}">{{$mt->mentor_name}}</option>
                                @endforeach
                            </select>  
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button class="btn btn-success" type="submit">
                            Tambahkan
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="card mb-4 shadow">
        <h5 class="card-header">Soal 1</h5>
        <div class="card-body">
            <h5 class="card-title">Mentor yang mengambil course terbanyak adalah</h5>
            <p class="card-text">
                <?php
                    foreach ($mentor as $mt) {
                        echo $mt->mentor_name.', ';
                    }
                ?>
            </p>
            <a class="btn btn-primary" href="/count-mentor">
                Temukan
                <i class="fa fa-search" aria-hidden="true"></i>
            </a>
        </div>
    </div>
    <div class="card mb-4 shadow">
        <h5 class="card-header">Soal 2</h5>
        <div class="card-body">
          <h5 class="card-title">Jumlah yang mengambil course Golang sebanyak</h5>
            <p class="card-text badge bg-primary text-wrap">
                {{$golang}} Orang
            </p>
        </div>
    </div>
    <div class="card mb-4 shadow">
        <h5 class="card-header">Soal 3</h5>
        <div class="card-body">
            <h5 class="card-title">Member yang mengambil course terbanyak adalah</h5>
            <p class="card-text">
            <?php
                foreach ($member as $mb) {
                    echo $mb->member_name.', ';
                }
            ?>
            </p>
            <a class="btn btn-primary" href="/count-member">
                Temukan
                <i class="fa fa-search" aria-hidden="true"></i>
            </a>
        </div>
    </div>

@endsection

@section('table')
    
<script>
    $(document).ready( function () {
        $('#data-tabel').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('dataCourse') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'member', name: 'member' },
                { data: 'course', name: 'course' },
                { data: 'mentor', name: 'mentor' },
                { data: 'action', name: 'action' },
            ]
        });
    } );
</script>

@endsection