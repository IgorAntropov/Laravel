@extends('layout')

@section('title')
    Posts page
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

    <form method="post" action="/posts/add">
        @csrf
        <input type="text" name="name" id="name" placeholder="Name" class="form-control"><br>
        <textarea name="message" id="message" placeholder="Message" class="form-control"></textarea><br>
        <div class="d-flex flex-wrap justify-content-center flex-column">
            <h4>Start date:</h4>
            <input type="datetime-local" name="startDate" id="startDate" class="form-control">
        </div><br>
        <div class="d-flex flex-wrap justify-content-center flex-column">
            <h4>End date:</h4>
            <input type="datetime-local" name="endDate" id="endDate" class="form-control">
        </div><br>
        <div class="d-flex flex-wrap justify-content-center flex-column my-3">
            <h4>Privacy:</h4>
            <label class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <span class="bold mx-4" style="width: 30px">Private</span>
                <input type="radio" name="privacy" id="private" value="off">
            </label>
            <label class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <span class="bold mx-4" style="width: 30px">Public</span>
                <input type="radio" name="privacy" id="public" value="on" checked>
            </label>
        </div>
        <button type="submit" class="btn btn-success">Post</button>
    </form>
@endsection

@section('sub_content')
    @include('show')
@endsection
