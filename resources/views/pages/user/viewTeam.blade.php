@extends('layouts.appUser')
@section('contentUser')
    <h1>Welcome to </h1>
    <ul><h2>Virtual Meeting</h2></ul>
    <a class = "btn btn-primary" href="{{route('addMember')}}">Meeting</a>
@endsection
