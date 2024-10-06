@extends('layouts.public')

@section('content')
<div class="container">
    <h1>{{$title}}</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Sadrzaj</th>
                <th>Kreator</th>
                <th>Lajkovi</th>
                <th>Dislajkovi</th>
                <th>Obrisi</th>
                <th>Ban</th>
            </tr>
        </thead>
        <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td>{{ $comment->content }}</td>
                    <td>{{ $comment->user->name }}</td>
                    <td>{{ $comment->likes }}</td>
                    <td>{{ $comment->dislikes }}</td>
                    <td>
                        <a href="{{route('comment.destroy', $comment->id)}}" class="btn btn-danger">Obrisi</a>
                    </td>
                    @if ($comment->ipAddress && $comment->ipAddress->banned==1)
                        <td>
                            <a href="{{route('comment.ban-ip', $comment->id)}}" class="btn btn-success" @disabled(true) >Banned</a>
                        </td>
                    @else
                        <td>
                            <a href="{{route('comment.ban-ip', $comment->id)}}" class="btn btn-danger">Ban</a>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<style>
    a[disabled] {
        pointer-events: none;
    }
</style>
@endsection