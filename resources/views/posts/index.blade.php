@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Post List</h1>

        <a href="" class="btn btn-primary mb-3">Create</a>
{{--        {{ route('posts.create') }}--}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            {{dd($posts)}}

            </tbody>
        </table>
    </div>
@endsection
