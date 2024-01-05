@extends('layouts.master')

@section('content')
    <h2>Create Article</h2>
    <form action="/admin/articles/create" method="POST">
      @csrf
      <div class="form-group">
        <label for="title">title:</label>
        <input type="text" name="title" class="form-control">
      </div>
      <div class="form-group">
        <label for="body">body:</label>
        <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
      </div>
      <button class="btn btn-danger">send</button>
    </form>
@endsection