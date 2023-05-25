<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>View Create</h1>
    @if ($errors->has('name'))
        <span style="color:red;">{{ $errors->first('name') }}</span>
    @endif
    @if (session()->has('error_message'))
        <span style="color:red;">{{ session()->get('error_message') }}</span>
    @endif
    {!! Form::open(['url' => 'backend/view/store']) !!}
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">

        <input type="submit" value="Create">
    {!! Form::close() !!}
</body>
</html>