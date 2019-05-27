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

    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('events.store')}}" method="POST">
        @csrf
        <label for="event_name">Name</label>
        <input value="{{old('event_name')}}" class="form-control {{$errors->first('event_name') ? "is-invalid": ""}}" placeholder="Event Name" type="text" name="event_name" id="event_name"/>
        <div class="invalid-feedback">
          {{$errors->first('event_name')}}
        </div>
        <br>

        <label for="location">location</label>
        <input value="{{old('location')}}" class="form-control {{$errors->first('location') ? "is-invalid" : ""}}" placeholder="location" type="text" name="location" id="location"/>
        <div class="invalid-feedback">
          {{$errors->first('location')}}
        </div>

        <br>

        <label for="start_date">Start Date</label>
        <br>
        <input  id="datepicker" value="{{old('start_date')}}" type="text" name="start_date" class="form-control {{$errors->first('start_date') ? "is-invalid" : ""}} ">
        <script>
                $('#datepicker').datepicker({
                    uiLibrary: 'bootstrap4'
                });
            </script>
        <div class="invalid-feedback">
          {{$errors->first('start_date')}}
        </div>

        <br>
        <label for="finish_date">Finish Date</label>
        <br>
        <input value="{{old('finish_date')}}" type="text" name="finish_date" class="form-control {{$errors->first('finish_date') ? "is-invalid" : ""}} ">
        <script>
                $('#datepicker').datepicker({
                    uiLibrary: 'bootstrap4'
                });
            </script>
        <div class="invalid-feedback">
          {{$errors->first('finish_date')}}
        </div>


        <br>
        <label for="logo">Logo image</label>
        <br>
        <input id="logo" name="logo" type="file" class="form-control {{$errors->first('logo') ? "is-invalid" : ""}}">
        <div class="invalid-feedback">
          {{$errors->first('logo')}}
        </div>


        <hr class="my-4">

        <label for="quota_participant">quota_participant</label>
        <input value="{{old('quota_participant')}}" class="form-control {{$errors->first('quota_participant') ? "is-invalid" : ""}}" placeholder="quota_participant" type="text" name="quota_participant" id="quota_participant"/>
        <div class="invalid-feedback">
          {{$errors->first('quota_participant')}}
        </div>
        <br>
        <label for="id_category"> Category</label>
        <select value="{{old('id_category')}}"class="form-control" name="id_category" id="id_category">
          @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->category_name}}</option>
          @endforeach
        </select>


        <input class="btn btn-primary" type="submit" value="Save"/>
    </form>
</div>
@endsection
