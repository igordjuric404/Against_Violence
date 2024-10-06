@extends('layouts.public')

@section('content')
<div class="container">
    <h1>{{$title}}</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Naslov</th>
                <th>Kreator</th>
                <th>Lajkovi</th>
                <th>Dislajkovi</th>
                <th>Objavi</th>
                <th>Obrisi</th>
                <th>Ban</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->likes }}</td>
                    <td>{{ $post->dislikes }}</td>
                    @if ($post->publish)
                        <td>
                            <a href="{{route('post.unpublish', $post->id)}}" class="btn btn-success">Objavi</a>
                        </td>
                    @else
                        <td>
                            <a href="{{route('post.publish', $post->id)}}" class="btn btn-danger">Objavi</a>
                        </td>
                    @endif
                    <td>
                        <a href="{{route('post.destroy', $post->id)}}" class="btn btn-danger">Obrisi</a>
                    </td>
                    @if ($post->ipAddress && $post->ipAddress->banned==1)
                        <td>
                            <a href="{{route('post.ban-ip', $post->id)}}" class="btn btn-success" @disabled(true) >Banned</a>
                        </td>
                    @else
                        <td>
                            <a href="{{route('post.ban-ip', $post->id)}}" class="btn btn-danger">Ban</a>
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