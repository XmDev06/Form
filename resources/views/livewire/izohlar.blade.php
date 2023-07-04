<div>


@foreach($comments as $comment)
    <div class="commented-section mt-2">
        <p class="pb-0 mb-0"><span
                class="text-white">{{\App\Models\User::find($comment->user_id)->name}}</span>
            <small class="comment-text-sm"
                   style="font-size: 10px;">{{ $comment->created_at->isoFormat('MMMM DD YYYY HH:mm') }}</small>
        </p>

        <div class="comment-text-sm mt-1 mx-4">
            <span>{{$comment->comment}}</span>
        </div>

    </div>
    <hr class="mb-1 mt-5">
@endforeach
</div>
