@vite(['resources/css/movie-detail.css'])
<div class="comments-section">
    <h2 class="section-title">Comments</h2>

    {{-- Only show the form to logged-in users --}}
    @auth
        <div class="comment-input-wrap">
            <form action="{{ $route }}" method="POST">
                @csrf
                <input type="hidden" name="media_type" value="{{ $mediaType }}">
                <textarea
                    class="comment-input"
                    name="comment"
                    placeholder="Add a comment..."
                >{{ old('comment') }}</textarea>

                @error('comment')
                    <p class="comment-error">{{ $message }}</p>
                @enderror

                <div class="comment-actions">
                    <button class="btn-comment" type="submit">Post</button>
                </div>
            </form>
        </div>
    @else
        <p class="comment-login-prompt">
            <a href="{{ route('login') }}">Log in</a> to leave a comment.
        </p>
    @endauth

    <div class="comment-list">
        @forelse($comments as $comment)
            <div class="comment-item">
                <div class="comment-avatar">
                    {{ strtoupper(substr($comment->user->name ?? 'U', 0, 1)) }}
                </div>
                <div class="comment-body">
                    <div class="comment-header">
                        <span class="comment-user">{{ $comment->user->name ?? 'Deleted user' }}</span>
                        <span class="comment-time">{{ $comment->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="comment-text">{{ $comment->comment }}</div>
                    <div class="comment-likes">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3H14z"/>
                            <path d="M7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"/>
                        </svg>
                        Like
                    </div>
                </div>
            </div>
        @empty
            <p class="no-comments">No comments yet. Be the first!</p>
        @endforelse
    </div>
</div>