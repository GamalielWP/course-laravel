@extends('template.base')

@section('content')

        <a href="/add-index">Tambah Course</a>
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
                {{-- @foreach ($course as $cs)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$cs->member->member_name}}</td>
                    <td>{{$cs->type->name}}</td>
                    <td>{{$cs->mentor->mentor_name}}</td>
                    <td>
                        <a href="/edit-index/{{$cs->id}}">Edit</a>
                        <a href="/delete-course/{{$cs->id}}">Delete</a>
                    </td>
                </tr>
                @endforeach --}}
            </tbody>
        </table>
        
        <span>Mentor yang mengambil course terbanyak :
            <?php
                foreach ($mentor as $mt) {
                    echo $mt->mentor_name.', ';
                }
            ?>
        </span><a href="/count-mentor">Temukan</a><br>

        <span>Jumlah yang mengambil course Golang : {{$golang}}</span><br>
        
        <span>Member yang mengambil course terbanyak :
            <?php
                foreach ($member as $mb) {
                    echo $mb->member_name.', ';
                }
            ?>
        </span><a href="/count-member">Temukan</a><br>

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