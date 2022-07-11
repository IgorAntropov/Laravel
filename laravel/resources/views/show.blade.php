@if(!empty($posts))
    <h2 class="mt-5">All posts:</h2>

    @foreach($posts as $post)
        <div class="alert alert-warning">
            <h4 style="overflow-wrap: break-word;">{{ $post->name }}</h4>
            <h4 style="overflow-wrap: break-word;">{{ $post->message }}</h4>
            <a href="{{ route('post.open', ['slug' => $post->slug, 'id' => $post->id]) }}"><h4>Open post</h4></a>
        </div>
    @endforeach
@else
    <h2 class="mt-5">Post list is empty.</h2>
@endif
