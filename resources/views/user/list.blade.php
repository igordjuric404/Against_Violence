@extends('layouts.public')

@section('content')
<div class="container">
    <h1>{{$title}}</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Ime</th>
                <th>Broj komentara</th>
                <th>Broj postova</th>
                <th>Obrisi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{count($user->comments)}}</td>
                    <td>{{count($user->posts)}}</td>
                    <td>
                        <a href="{{route('user.destroy', $user->id)}}" class="btn btn-danger">Obrisi</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection