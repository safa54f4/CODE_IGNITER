<!DOCTYPE html>
<html>
    <head>
        <title>BIODATA</title>
    </head>
    <body>
        <h1>BIODATA</h1>
        <p>Nama : {{ $nama }}</p>
        <p>Materi Mengajar</p>
        <ul>
            @foreach($materi as $datamateri)
            <li>{{ $datamateri}}</li>
            @endforeach
        </ul>
    </body>
</html>