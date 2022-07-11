@extends('layout')

@section('title')
    Details page
@endsection

@section('main_content')
    <h2 class="mt-5">Details:</h2>

    <div class="alert alert-warning">
        <h4>{{ $post->name }}</h4>
        <h4>{{ $post->message }}</h4>
    </div>
@endsection

@section('sub_content')
    @include('show')
@endsection
