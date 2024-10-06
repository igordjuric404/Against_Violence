@extends('layouts.public')

@section('content')
    <div class="container d-flex justify-content-center mt-5">
        <div class="w-100">
            <a href="{{ route('post.create') }}" class="add-post btn btn-primary mb-4">Dodaj anonimnu izjavu</a>

            <div class="d-flex flex-wrap custom-gap col-md-12 px-0">
                @foreach ($posts as $post)
                    <div class="custom-col">
                        <a href="{{ route('post.show', $post->id) }}">
                            <div class="card">
                                <div class="card-body">
                                    <h6>#{{$post->user->name}}</h6>
                                    <h5 class="card-title">
                                        <a href="{{ route('post.show', $post->id) }}" class="text-decoration-none">{{ $post->title }}</a>
                                    </h5>
                                    <p class="card-text">
                                        {{ Str::limit($post->content, 100, '...') }}
                                        <a href="{{ route('post.show', $post->id) }}" class="read-more">Pročitaj još</a>
                                    </p>
                                    <div class="post-meta">
                                        <span class="likes"><i class="bi bi-hand-thumbs-up"></i>{{ $post->likes }}</span>
                                        <span class="dislikes"><i class="bi bi-hand-thumbs-down"></i>{{ $post->dislikes }}</span>
                                        <span class="comments"><i class="bi bi-chat"></i></i>{{ $post->comments->count() }}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
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

    .card-title a {
        font-size: 24px;
        color: #333;
    }

    .card-title a:hover {
        color: #0056b3;
    }

    .card-text {
        font-size: 18px;
        margin-bottom: 1rem;
        color: #666;
    }

    .read-more {
        color: #0056b3;
        text-decoration: none;
        font-weight: bold;
    }

    .read-more:hover {
        text-decoration: underline;
    }

    .post-meta {
        display: flex;
        /* justify-content: space-between; */
        gap: 10px;
        color: #999;
        font-size: 0.9rem;
    }

    .post-meta span{
        font-size: 18px;
        display: flex;
    }

    .comments{
        gap: 3px;
    }
    .likes{
        color: rgb(1, 163, 1)
    }

    .dislikes{
        color: rgb(187, 0, 0)
    }
    .add-post {
        background-color: rgb(106, 139, 248) !important;
        border: #fff 1px solid !important;
        padding: 15px !important;
    }
</style>
@endsection
