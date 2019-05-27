@extends("layouts.global")
@section("title") Create New Event @endsection
@section("content")
<section class="banner_part isi">
<div class="col-md-8">

    @if(session('status'))
      <div class="alert alert-success">
        {{session('status')}}
      </div>
    @endif

    <form
    enctype="multipart/form-data"
    class="bg-white shadow-sm p-3"
    action="{{route('categories.store')}}"
    method="POST">

    @csrf

    <label>Category name</label><br>
    <input
      type="text"
      class="form-control {{$errors->first('category_name') ? "is-invalid" : ""}}"
      value="{{old('category_name')}}"
      name="category_name">
    <div class="invalid-feedback">
      {{$errors->first('category_name')}}
    </div>
    <br>


    <br>

    <input
      type="submit"
      class="btn btn-primary"
      value="Save">

  </form>
</div>
@endsection
