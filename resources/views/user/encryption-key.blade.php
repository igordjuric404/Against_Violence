@extends('layouts.public')

@section('content')
<div class="container">
    <h1>{{$title}}</h1>
    
    <form action="{{ route('user.setEncryptionKey') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="encryption_key">Kljuc za enkriptovanje podataka:</label>
            <input type="password" name="encryption_key" id="encryption_key" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Potvrdi</button>
    </form>
</div>
@endsection