{{--<form action="{{route('comment.store')}}" method="post">--}}
{{--    <div class="d-flex flex-row add-comment-section mt-4 mb-4">--}}
{{--        @csrf--}}
{{--        <input name="comment" type="text" class="form-control mr-3"--}}
{{--               placeholder="Add comment">--}}
{{--        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">--}}
{{--        <input type="hidden" name="post_id" value="{{$post->id}}">--}}
{{--        <input type="hidden" name="created_at" value="{{\Carbon\Carbon::now()}}">--}}
{{--        <input type="hidden" name="updated_at" value="{{\Carbon\Carbon::now()}}">--}}
{{--        <input type="hidden" name="url" value="{{url()->current()}}">--}}
{{--        <button class="btn btn-primary" type="submit">Comment</button>--}}
{{--    </div>--}}
{{--</form>--}}


<form wire:submit.prevent="save" id="form_id">
        <div class="d-flex flex-row add-comment-section mt-4 mb-4">
            @csrf

            <input wire:model.defer="izoh" type="text" class="form-control mr-3" placeholder="Add comment">
            <button type="submit" class="btn btn-primary">Send</button>
        </div>
</form>


