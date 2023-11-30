<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Profile Page</h1>


    <form action="{{ route('profile.update') }}" method="POST">
    @csrf
    @method('PATCH')

        {{-- <input type="text" name="something" > --}}
        <label for="name">Name</label>
        <input name="name" type="text" value="{{ old('name' , auth()->user()->name) }}">

        <label for="email">Email</label>
        <input name="email" type="text" value="{{ old('email' , auth()->user()->email) }}">

        <button type="submit">Change!</button>
    </form>
</body>
</html>