<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>This is Testing Laravel Route</h1>

    <h3>Person Info</h3>
    <p>Name : {{ $person["name"] }} </p>
    <p>Age : {{ $person["age"] }} </p>

    <hr/>

    <h3>Fruits</h3>
    <ul>
        @foreach ($fruits as $fruit)
            <li>{{ $fruit }}</li>
        @endforeach
    </ul>
</body>
</html>