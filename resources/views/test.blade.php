<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Dashboard</h1>
    @if(isset($status) && isset($name))
        <p>Status: {{ $status }}</p>
        <p>Name: {{ $name }}</p>
    @else
        <p>No data received.</p>
    @endif
</body>
</html>
