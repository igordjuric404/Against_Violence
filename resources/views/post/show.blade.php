@extends('layouts.public')

@section('content')
<div class="container mt-5">
    <div class="post card mb-4">
        <div class="card-body">
            <h6>#{{$post->user->name}}</h6>
            <h3 class="card-title">{{$post->title}}</h3>
            <p class="card-text">{{$post->content}}</p>
            <p class="post-meta">
                @if (Auth::check())
                    @if (Auth::user()->likedPosts->contains($post->id))
                        <a href="{{ route('post.like', $post->id) }}" class="likes" @disabled(true)>
                            <i class="bi bi-hand-thumbs-up"></i> {{$post->likes}}
                        </a>
                    @else
                        <a href="{{ route('post.like', $post->id) }}" class="likes">
                            <i class="bi bi-hand-thumbs-up"></i> {{$post->likes}}
                        </a>
                    @endif

                    @if (Auth::user()->dislikedPosts->contains($post->id))
                        <a href="{{ route('post.dislike', $post->id) }}" class="dislikes" @disabled(true)>
                            <i class="bi bi-hand-thumbs-down"></i> {{$post->dislikes}}
                        </a>
                    @else
                        <a href="{{ route('post.dislike', $post->id) }}" class="dislikes">
                            <i class="bi bi-hand-thumbs-down"></i> {{$post->dislikes}}
                        </a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="likes" @disabled(true)>
                        <i class="bi bi-hand-thumbs-up"></i> {{$post->likes}}
                    </a>
                    <a href="{{ route('login') }}" class="dislikes" @disabled(true)>
                        <i class="bi bi-hand-thumbs-down"></i> {{$post->dislikes}}
                    </a>
                @endif
            </p>
            <div>
                <form action="{{route('comment.comment', $post->id)}}" method="POST">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <div class="form-group">
                        <textarea name="content" class="form-control" rows="3" placeholder="Vaš komentar..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Komentariši</button>
                </form>
            </div>
        </div>
    </div>

    <div class="comments">
        @foreach ($post->comments as $comment)
            @if(!$comment->parent_id)
            <div class="comment card mb-3" data-comment-id="{{ $comment->id }}">
                <div class="card-body">
                    <h6>#{{$comment->user->name}}</h6>
                    <p>&emsp;{{$comment->content}}</p>
                    <p class="post-meta">
                        @if (Auth::check())
                            @if (Auth::user()->likedComments->contains($comment->id))
                                <a href="{{ route('comment.like', $comment->id) }}" class="likes" @disabled(true)>
                                    <i class="bi bi-hand-thumbs-up"></i> {{$comment->likes}}
                                </a>
                            @else
                                <a href="{{ route('comment.like', $comment->id) }}" class="likes">
                                    <i class="bi bi-hand-thumbs-up"></i> {{$comment->likes}}
                                </a>
                            @endif

                            @if (Auth::user()->dislikedComments->contains($comment->id))
                                <a href="{{ route('comment.dislike', $comment->id) }}" class="dislikes" @disabled(true)>
                                    <i class="bi bi-hand-thumbs-down"></i> {{$comment->dislikes}}
                                </a>
                            @else
                                <a href="{{ route('comment.dislike', $comment->id) }}" class="dislikes">
                                    <i class="bi bi-hand-thumbs-down"></i> {{$comment->dislikes}}
                                </a>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="likes" @disabled(true)>
                                <i class="bi bi-hand-thumbs-up"></i> {{$comment->likes}}
                            </a>
                            <a href="{{ route('login') }}" class="dislikes" @disabled(true)>
                                <i class="bi bi-hand-thumbs-down"></i> {{$comment->dislikes}}
                            </a>
                        @endif -
                        <a href="#" class="reply-link" data-comment-id="{{ $comment->id }}">Reply</a>
                    </p>
                    @foreach ($comment->children as $child)
                        <div class="child-comment ml-4 mb-2">
                            <h6>#{{$child->user->name}}</h6>
                            <p>&emsp;{{$child->content}}</p>
                            <p class="post-meta">
                                @if (Auth::check())
                                    @if (Auth::user()->likedComments->contains($child->id))
                                        <a href="{{ route('comment.like', $child->id) }}" class="likes" @disabled(true)>
                                            <i class="bi bi-hand-thumbs-up"></i> {{$child->likes}}
                                        </a>
                                    @else
                                        <a href="{{ route('comment.like', $child->id) }}" class="likes">
                                            <i class="bi bi-hand-thumbs-up"></i> {{$child->likes}}
                                        </a>
                                    @endif
        
                                    @if (Auth::user()->dislikedComments->contains($child->id))
                                        <a href="{{ route('comment.dislike', $child->id) }}" class="dislikes" @disabled(true)>
                                            <i class="bi bi-hand-thumbs-down"></i> {{$child->dislikes}}
                                        </a>
                                    @else
                                        <a href="{{ route('comment.dislike', $child->id) }}" class="dislikes">
                                            <i class="bi bi-hand-thumbs-down"></i> {{$child->dislikes}}
                                        </a>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}" class="likes" @disabled(true)>
                                        <i class="bi bi-hand-thumbs-up"></i> {{$child->likes}}
                                    </a>
                                    <a href="{{ route('login') }}" class="dislikes" @disabled(true)>
                                        <i class="bi bi-hand-thumbs-down"></i> {{$child->dislikes}}
                                    </a>
                                @endif
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
        @endforeach
    </div>
</div>

<div id="reply-form-template" class="d-none">
    <form action="" method="POST" class="reply-form">
        @csrf
        <input type="hidden" name="parent_id" value="">
        <div class="form-group">
            <textarea name="content" class="form-control" rows="3" placeholder="Your reply..." required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<style>
    .post {
        background-color: #f4f4ff !important;
        border-radius: 6px;
        border: none;
        box-shadow: 6px 6px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
        padding: 1.5rem;
    }

    .post:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .card-title {
        font-size: 24px;
        color: #333;
    }

    .card-text {
        font-size: 18px;
        color: #666;
    }

    .post-meta {
        display: flex;
        gap: 10px;
        color: #999;
        font-size: 0.9rem;
    }

    .post-meta a {
        text-decoration: none;
        font-size: 18px;
    }

    .post-meta a:hover {
        text-decoration: underline;
    }

    .likes {
        color: rgb(1, 163, 1);
        display: flex;
        align-items: center;
    }

    .dislikes {
        color: rgb(187, 0, 0);
        display: flex;
        align-items: center;
    }

    .comment, .child-comment {
        background-color: #f8f9fa;
        border-radius: 6px;
        border: none;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        padding: 1rem;
    }

    .child-comment {
        margin-left: 2rem;
    }

    .add-post {
        background-color: rgb(106, 139, 248) !important;
        border: #fff 1px solid !important;
        padding: 15px !important;
    }
    a[disabled] {
        pointer-events: none;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.reply-link').forEach(function(element) {
            element.addEventListener('click', function(event) {
                event.preventDefault();
                let commentId = this.getAttribute('data-comment-id');
                let replyFormTemplate = document.getElementById('reply-form-template').innerHTML;
                let replyForm = document.createElement('div');
                replyForm.innerHTML = replyFormTemplate;

                replyForm.querySelector('form').setAttribute('action', '{{ url('comment/reply') }}/' + commentId);
                replyForm.querySelector('input[name="parent_id"]').value = commentId;

                let commentCard = document.querySelector('.comment[data-comment-id="' + commentId + '"]');
                let existingReplyForm = commentCard.querySelector('.reply-form');
                if (existingReplyForm) {
                    existingReplyForm.remove();
                }

                commentCard.appendChild(replyForm);
            });
        });
    });
</script>
@endsection
