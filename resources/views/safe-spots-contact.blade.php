@extends('layouts.public')

@section('content')
<div class="container d-flex justify-content-center mt-5">
    <div class="w-100">
        <h1 class="mb-4">Kontakt sigurnih mesta</h1>
        <div class="d-flex flex-wrap custom-gap col-md-12 px-0">
            @foreach ($safeSpots as $spot)
                <div class="custom-col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $spot['name'] }}</h5>
                            <p class="card-text">
                                <strong>Lokacija:</strong> {{ $spot['location'] }}<br>
                                <strong>Broj telefona:</strong> {{ $spot['phone'] }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<style>
    .custom-gap {
        gap: 1rem; /* Adjust the gap as needed */
    }

    .custom-col {
        flex: 0 0 calc(50% - 1rem); /* Adjust the width and gap as needed */
        margin-bottom: 1rem; /* Adjust the bottom margin as needed */
    }

    .card {
        background-color: #f4f4ff !important;
        border-radius: 6px;
        border: none;
        box-shadow: 6px 6px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .card-body {
        padding: 1.5rem;
    }

    .card-title {
        font-size: 24px;
        color: #333;
    }

    .card-title:hover {
        color: #0056b3;
    }

    .card-text {
        font-size: 18px;
        margin-bottom: 1rem;
        color: #666;
    }
</style>
@endsection
