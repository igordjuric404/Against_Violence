
@extends('layouts.public')

@section('content')
<div class="container">
    <h1>Moj kutak</h1>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <form action="{{ route('evidence-file.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="file">Izaberite fajl:</label>
            <input type="file" name="file[]" id="file" class="form-control" multiple required>
        </div>
        <div class="form-group">
            <label for="encryption_key">Ključ za enkripciju:</label>
            <input type="password" name="encryption_key" id="encryption_key" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
    @if (!empty($files[0]))
        <hr>
        <h2>Moji fajlovi</h2>
        <ul>
            @foreach($files as $file)
            <li>
                {{ $file->filename }} 
                <form action="{{ route('evidence-file.download', $file->id) }}" method="POST" style="display:inline">
                    @csrf
                    <div class="form-group" style="display:inline">
                        <input type="password" name="encryption_key" placeholder="Ključ za preuzimanje" required>
                    </div>
                    <button type="submit" class="btn btn-link">Preuzmi</button>
                </form>
            </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection