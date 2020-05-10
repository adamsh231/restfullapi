<!doctype html>
<html lang="en">

<head>
    <title>Hello, world!</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    <div id="app" class="container-fluid" style="margin-left: 40%; margin-top: 10%">

        <div class="card" style="width: 18rem;">
            <img src="https://picsum.photos/seed/picsum/300/200" class="card-img-top" alt="...">
            <div class="card-body">
                <example-component></example-component>
            </div>
        </div>
    </div>
</body>

</html>
