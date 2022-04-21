@extends('layouts.appUser')
@section('contentUser')
    <h1>Welcome to the User Home Page</h1>
    <ul><h2>Virtual Meeting</h2></ul>
    <a class = "btn btn-primary" href="{{route('meeting')}}">Meeting</a>

    <div class="card" style="width: 18rem;">
    <img class="card-img-top" src="https://th.bing.com/th/id/OIP.RetLRCdhnOuKlzAGrP4sowAAAA?pid=ImgDet&w=400&h=400&rs=1">
    <div class="card-body">
    <h5 class="card-title">Create New Team</h5>
    <a href="{{route('createTeam')}}" class="btn btn-primary">Create Team</a>
  </div>
</div>

<div class="card" style="width: 18rem;">
  <div class="card-header">
    Teams
  </div>
  <ul class="list-group list-group-flush">
    @foreach($team as $t)
        <a href="/user/{{$t->name}}" class="btn btn-primary">{{$t->name}}</a>
    @endforeach
  </ul>
</div>
@endsection
