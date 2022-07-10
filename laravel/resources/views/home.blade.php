@extends('layout')

@section('title')
    Home page
@endsection

@section('main_content')
    <h2 class="mt-5">All news:</h2>

    @foreach($news as $new)
        @if(strtotime($new->startDate) <= strtotime(date('Y-m-d')) && strtotime($new->endDate) >= strtotime(date('Y-m-d')) && $new->privacy = 'on')
            <div class="alert alert-warning">
                <h3 style="overflow-wrap: break-word;">{{ $new->subject }}</h3>
                <h4 style="overflow-wrap: break-word;">{{ $new->message }}</h4>
                <a href="{{ route('news.open', ['slug' => $new->slug, 'id' => $new->id]) }}"><h4>Open post</h4></a>
            </div>
        @endif
    @endforeach
@endsection
