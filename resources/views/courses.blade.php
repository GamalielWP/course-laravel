@extends('template.base')

@section('content')

    <div class="card mb-4 shadow">
        <div class="card-body">
            <a class="btn btn-primary" href="/add-index">
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