<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>vRean</title>
</head>
<body>
    {{-- <h1>{{ $myarray }}</h1> --}}
    <form action="{{ route('bkosal') }}" method="post">
        @csrf
        <input type="hidden" name="idclass" value={{ $myarray }}>
        <input type="submit" value="Material">
    </form>
</body>
</html>