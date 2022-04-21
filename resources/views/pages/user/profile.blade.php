<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    </head>
    <body>
    <div class = "container">
    <br><br>
     <h1>Profile</h1>
    <form action= "{{route('profileUserEdit')}}" class "form-group" method = "post" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="row ">
                <div class="form-group">
                    <input type="text" name="id"  value = "{{$user->id}}" class="form-control" readonly>
                </div>
        <div class="form-group">
                <input type="text" name="name"  value = "{{$user->name}}" class="form-control">
            </div>
            <br>
            <div class="form-group">
                <input type="text" name="password"  value = "{{$user->password}}" class="form-control">
            </div>
            <br>
            <div class="form-group">
                <input type="text" name="email" value = "{{$user->email}}" class="form-control">
            </div>

            <br>
            <div class="form-group">
                <input type="text" name="phone"  value = "{{$user->phone}}"class="form-control">
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
            <button type="submit" class="btn btn-success">Update</button>
        </div>
        </div>
    </form>
    </div>
    </body>
    </html>
