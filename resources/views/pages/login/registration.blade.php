<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    </head>
    <body>
    <div class = "container">
    <br><br>
     <h1>Register as an User</h1>
    <form action= "{{route('registration')}}" class "form-group" method = "post" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="row ">
        <div class="form-group">
                <input type="text" name="name" placeholder="Name" class="form-control">
                @error('name')
                <span class = "text-danger">{{$message}}</span>
            @enderror
            </div>
            <br>
            <br>
            <div class="form-group">
                <input type="text" name="password" placeholder="Password" class="form-control">
                @error('password')
                <span class = "text-danger">{{$message}}</span>
            @enderror
            </div>
            <br>
            <br>
            <div class="form-group">
                <input type="text" name="email" Placeholder="Email"class="form-control">
                @error('email')
                <span class = "text-danger">{{$message}}</span>
            @enderror
            </div>

            <br>
            <br>
            <div class="form-group">
                <input type="text" name="phone" Placeholder="Phone"class="form-control">
                @error('phone')
                <span class = "text-danger">{{$message}}</span>
            @enderror
            </div>

            <br>
            <br>
            <div class="form-group">
                <input type="file" name="image_path" class="form-control">
                @error('image_path')
                <span class = "text-danger">{{$message}}</span>
            @enderror
            </div>

            <br>
            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>

        </div>
        </div>
    </form>
    </div>
    </body>
    </html>
