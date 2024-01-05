@extends('layouts.master')

@section('content')
    <h2>Create Article</h2>
    <form action="/admin/articles/create" method="POST">
      @csrf
      <label for="title">title:</label>
      <input type="text" name="title">
      <button>send</button>
    </form>
@endsection