@extends('layouts.global')

@section('title') Detail user @endsection

@section('content')

<section class="banner_part isi">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
            <b>Name:</b> <br/>
            {{$user->name}}
            <br><br>

            @if($user->avatar)
            <img src="{{asset('storage/'. $user->avatar)}}" width="128px"/>
            @else
            No avatar
            @endif

            <br>
            <br>
            <b>Username:</b><br>
            {{$user->email}}

            <br>
            <br>
            <b>Phone number</b> <br>
            {{$user->phone}}

            <br><br>
            <b>Address</b> <br>
            {{$user->address}}

            <br>
            <br>

        </div>
    </div>
</section>
@endsection