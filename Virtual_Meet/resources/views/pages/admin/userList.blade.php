@extends('layouts.appAdmin')
@section('contentAdmin')
    <table class = "table table-border">
        <tr>
            <th>Name</th>
            <th>Password</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Image</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->password}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->image_path}}</td>
            <td><a href="/admin/editUser/{{$user->id}}">Edit</a></td>
            <td><a href="/admin/deleteUser/{{$user->id}}">Delete</a></td>
        </tr>
        @endforeach
@endsection
