@extends('layouts.appAdmin')
@section('contentAdmin')
    <table class = "table table-border">
        <tr>
            <th>Meeting Id</th>
            <th>User Id</th>
            <th>Created At</th>
        </tr>
        @foreach($meets as $meet)
        <tr>
            <td>{{$meet->meeting_id}}</td>
            <td>{{$meet->user_id}}</td>
            <td>{{$meet->created_at}}</td>
        </tr>
        @endforeach
@endsection
