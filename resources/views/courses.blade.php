@extends('template.base')

@section('content')

    <div class="container">
        <a href="">Tambah Course</a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Member Name</th>
                <th scope="col">Course</th>
                <th scope="col">Mentor</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($course as $cs)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$cs->member->member_name}}</td>
                    <td>{{$cs->type->name}}</td>
                    <td>{{$cs->mentor->mentor_name}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <span>Mentor yang mengambil course terbanyak :
            <?php
                foreach ($mentor as $mt) {
                    echo $mt->mentor_name.', ';
                }
            ?>
        </span><a href="/count-mentor">Refresh</a><br>

        <span>Jumlah yang mengambil course Golang : {{$golang}}</span><br>
        
        <span>Member yang mengambil course terbanyak :
            <?php
                foreach ($member as $mb) {
                    echo $mb->member_name.', ';
                }
            ?>
        </span><a href="/count-member">Refresh</a><br>
    </div>

@endsection