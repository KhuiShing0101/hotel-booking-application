<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>View Edit</h1>
    <form action="{{ url('/backend/view/update') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $view->id }}">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $view->name }}">

        <input type="submit" value="Edit">
    </form>
</body>
</html>