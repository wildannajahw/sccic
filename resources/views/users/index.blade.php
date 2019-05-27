@extends("layouts.global")
@section("title") Users list @endsection
@section("content")

<section class="banner_part isi">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <form action="{{route('users.index')}}">
                <div class="input-group">
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Filter name"
                      value="{{Request::get('name')}}"
                      name="name">

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
                <a href="{{route('users.create')}}" class="btn btn-primary">Create User</a>
            </div>
        </div>
        <br><br><br><br>
        <table class="table table-bordered">
                <thead>
                  <tr>
                    <th><b>Name</b></th>
                    <th><b>Username</b></th>
                    <th><b>Email</b></th>
                    <th><b>Avatar</b></th>
                    <th><b>Action</b></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                    <tr>
                      <td>{{$user->name}}</td>
                      <td>{{$user->username}}</td>
                      <td>{{$user->email}}</td>
                      <td>
                        @if($user->avatar)
                        <img src="{{asset('storage/'.$user->avatar)}}" width="70px"/>
                        @else
                        N/A
                        @endif

                      </td>
                      <td>
                        <a class="btn btn-info text-white btn-sm" href="{{route('users.edit', ['id'=>$user->id])}}">Edit</a>

                        <a href="{{route('users.show', ['id' => $user->id])}}" class="btn btn-primary btn-sm">Detail</a>

                        <form onsubmit="return confirm('Delete this user permanently?')" class="d-inline" action="{{route('users.destroy', ['id' => $user->id ])}}" method="POST">
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

