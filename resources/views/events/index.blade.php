@extends("layouts.global")
@section("title") Events list @endsection
@section("content")

<section class="banner_part isi">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <form action="{{route('events.index')}}">
                <div class="input-group">
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Filter name"
                      value="{{Request::get('event_name')}}"
                      name="event_name">

                    <div class="input-group-append">
                    <input
                        type="submit"
                        value="Filter"
                        class="btn btn-primary">
                    </div>
                </div>
            </form>

        <hr class="my-3">

        @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
        @endif

        <div class="row">
            <div class="col-md-12 text-right">
                <a href="{{route('events.create')}}" class="btn btn-primary">Create Event</a>
            </div>
        </div>
        <br><br><br><br>
        <table class="table table-bordered">
                <thead>
                  <tr>
                    <th><b>Event Name</b></th>
                    <th><b>Location</b></th>
                    <th><b>Start Date</b></th>
                    <th><b>Finish Date</b></th>
                    <th><b>Logo</b></th>
                    <th><b>Category</b></th>
                    <th><b>Quota</b></th>
                    <th><b>Action</b></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($events as $event)
                    <tr>
                      <td>{{$event->event_name}}</td>
                      <td>{{$event->location}}</td>
                      <td>{{$event->start_date}}</td>
                      <td>{{$event->finish_date}}</td>
                      <td>
                        @if($event->logo)
                        <img src="{{asset('storage/'.$event->logo)}}" width="70px"/>
                        @else
                        N/A
                        @endif

                      </td>
                      @foreach ($categories as $category)
                        @if ($category->id==$event->id_category)

                      <td>{{$category->category_name}}</td>
                        @endif
                      @endforeach
                      <td>{{$event->quota_participant}}</td>
                      <td>
                        <a class="btn btn-info text-white btn-sm" href="{{route('events.edit', ['id'=>$event->id])}}">Edit</a>


                        <form onsubmit="return confirm('Delete this event permanently?')" class="d-inline" action="{{route('events.destroy', ['id' => $event->id ])}}" method="POST">
                          @csrf
                          <input type="hidden" name="_method" value="DELETE">

                          <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
    </div>
    <div class="hero-app-1 custom-animation"><img src="img/animate_icon/icon_1.png" alt=""></div>
    <div class="hero-app-5 custom-animation2"><img src="img/animate_icon/icon_3.png" alt=""></div>
    <div class="hero-app-7 custom-animation3"><img src="img/animate_icon/icon_2.png" alt=""></div>
    <div class="hero-app-8 custom-animation"><img src="img/animate_icon/icon_4.png" alt=""></div>
</section>

@endsection

