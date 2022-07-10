@extends('layout')

@section('title')
    Details page
@endsection

@section('main_content')
    <h2 class="mt-5">Details:</h2>

    @foreach($news as $new)
        @if(strtotime($new->startDate) <= strtotime(date('Y-m-d')) && strtotime($new->endDate) >= strtotime(date('Y-m-d')) && $new->privacy = 'on')
            <div class="alert alert-warning">
                <h3>{{ $new->subject }}</h3>
                <h4>{{ $new->message }}</h4>
                <a href="/news/open/?value={{ $new->id }}"><h4>Open post</h4></a>
            </div>
        @endif
    @endforeach
@endsection
