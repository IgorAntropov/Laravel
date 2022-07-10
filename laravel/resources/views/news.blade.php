@extends('layout')

@section('title')
    News page
@endsection

@section('main_content')
    <h2>Create post</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="/news/add">
        @csrf
        <input type="email" name="email" id="email" placeholder="E-mail" class="form-control"><br>
        <input type="text" name="subject" id="subject" placeholder="Subject" class="form-control"><br>
        <textarea name="message" id="message" placeholder="Message" class="form-control"></textarea><br>
        <div class="d-flex flex-wrap justify-content-center flex-column">
            <h4>Start date:</h4>
            <input type="date" name="startDate" id="startDate" class="form-control">
        </div><br>
        <div class="d-flex flex-wrap justify-content-center flex-column">
            <h4>End date:</h4>
            <input type="date" name="endDate" id="endDate" class="form-control">
        </div><br>
        <div class="d-flex flex-wrap justify-content-center flex-column my-3">
            <h4>Privacy:</h4>
            <label class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <span class="bold mx-4" style="width: 30px">Private</span>
                <input type="radio" name="privacy" id="private" value="off">
            </label>
            <label class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <span class="bold mx-4" style="width: 30px">Public</span>
                <input type="radio" name="privacy" id="public" value="on">
            </label>
        </div>
        <button type="submit" class="btn btn-success">Post</button>
    </form>


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
