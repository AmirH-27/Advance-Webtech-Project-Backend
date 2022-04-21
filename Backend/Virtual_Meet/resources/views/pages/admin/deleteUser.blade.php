@extends('layouts.appAdmin')
@section('contentAdmin')
<br><br>
     <h1>Delete</h1>
    <form action= "{{route('deleteUser')}}" class "form-group" method = "post" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="row ">
                <div class="form-group">
                    <input type="text" name="id"  value = "{{$user->id}}" class="form-control" readonly>
                </div>
        <div class="form-group">
                <input type="text" name="name"  value = "{{$user->name}}" class="form-control" readonly>
            </div>
            <br>
            <div class="form-group">
                <input type="text" name="password"  value = "{{$user->password}}" class="form-control" readonly>
            </div>
            <br>
            <div class="form-group">
                <input type="text" name="email" value = "{{$user->email}}" class="form-control" readonly>
            </div>

            <br>
            <div class="form-group">
                <input type="text" name="phone"  value = "{{$user->phone}}"class="form-control" readonly>
            </div>
            <br>
            <br>
        </div>
        </div>
        <div class="col-md-3">
        <div class="card" style="width: 18rem;">
            <img class="img-thumbnail" src="{{asset('images/'.$user->image_path)}}" alt="Card image cap">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Delete</button>
        </div>
        </div>
    </form>
@endsection
