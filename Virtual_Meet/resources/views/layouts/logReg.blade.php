<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div style="display: flex;
    justify-content: center; padding: 50px 50px;">
    <div class="container">
        <div class="row">
            <div class="col" style="background-color: blue">
                @yield('left-content')
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque voluptas quaerat pariatur ad tempora nihil quidem. Dignissimos, adipisci? Id, architecto sapiente? Atque quam animi maiores repellendus quidem. Nostrum, ratione asperiores?</p>
            </div>
            <div class="col" style="background-color: red">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque voluptas quaerat pariatur ad tempora nihil quidem. Dignissimos, adipisci? Id, architecto sapiente? Atque quam animi maiores repellendus quidem. Nostrum, ratione asperiores?</p>
                @yield('right-content')
            </div>
        </div>

        <div class="row">
            <div class="col" style="background-color: green">
                @yield('bottom-content')
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque voluptas quaerat pariatur ad tempora nihil quidem. Dignissimos, adipisci? Id, architecto sapiente? Atque quam animi maiores repellendus quidem. Nostrum, ratione asperiores?</p>

            </div>
    </div>
    <p>hello</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
