@extends('layouts.global')
@section('title') Edit User @endsection
@section('content')
<section class="banner_part isi">
<div class="col-md-8">
    @if(session('status'))
      <div class="alert alert-success">
        {{session('status')}}
      </div>
    @endif
    <form
        action="{{route('categories.update', ['id' => $category->id])}}"
        enctype="multipart/form-data"
        method="POST"
        class="bg-white shadow-sm p-3"
        >

        @csrf

        <input
        type="hidden"
        value="PUT"
        name="_method">

        <label>Category name</label> <br>
        <input
        type="text"
        class="form-control {{$errors->first('category_name') ? "is-invalid" : ""}}"
        value="{{old('category_name') ? old('category_name') : $category->category_name}}"
        name="category_name">
        <div class="invalid-feedback">
            {{$errors->first('category_name')}}
        </div>


        <input type="submit" class="btn btn-primary" value="Update">

    </form>
  </div>
</div>
@endsection
