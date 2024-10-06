@extends('layouts.public')

@section('content')
<div class="container">
    @if (count($ip_addresses)>0)
    <h1>{{$title}}</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Adresa</th>
                <th>Unbanuj</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ip_addresses as $ip)
                <tr>
                    <td>{{ $ip->ip }}</td>
                    <td>
                        <a href="{{route('ip.unban', $ip->id)}}" class="btn btn-danger">Unbanuj</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <h1>Nema banovanih IP adresa</h1>
    @endif
</div>
@endsection