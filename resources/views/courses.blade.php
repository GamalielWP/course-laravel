@extends('template.base')

@section('content')

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
        
    <h6>Mentor yang mengambil course terbanyak :
        <?php
            foreach ($mentor as $mt) {
                echo $mt->mentor_name.', ';
            }
        ?>
    </h6>
    <a class="btn btn-primary btn-sm" href="/count-mentor">
        Temukan
        <i class="fa fa-search" aria-hidden="true"></i>
    </a>
        
    <h6>Member yang mengambil course terbanyak :
        <?php
            foreach ($member as $mb) {
                 echo $mb->member_name.', ';
            }
        ?>
    </h6>
    <a class="btn btn-primary btn-sm" href="/count-member">
        Temukan
        <i class="fa fa-search" aria-hidden="true"></i>
    </a>

    <h6>Jumlah yang mengambil course Golang : {{$golang}}</h6>

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