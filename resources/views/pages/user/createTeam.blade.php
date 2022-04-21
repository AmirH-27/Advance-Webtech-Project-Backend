<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    </head>
    <body>
    <div class = "container">
    <br><br>
     <h1>Create a new team</h1>
    <form action= "{{route('createTeam')}}" class "form-group" method = "post" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="row ">
        <div class="form-group">
                <input type="text" name="name" placeholder="Name" class="form-control">
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
