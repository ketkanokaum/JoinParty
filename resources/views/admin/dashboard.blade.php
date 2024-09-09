@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            text-align: center;
        }
        input {
            border: 1px solid;
        }
        tr, th, td{
            border: 1px solid;
        }
    </style>
</head>
<body>
    Hello Admin
    <table border="1">
    <thead>
        <tr>
            <th >Party ID</th>
            <th >date</th>
            <th >party_name</th>
            <th >location</th>
            <th >details</th>
            <th >participants</th>
            
        </tr>
    </thead>
    <tbody>
    <h2>Party</h2> 
    @foreach($parties as $Parties)
            <tr>
            <td>{{$Parties->id}} </td> 
            <td>{{$Parties->date}} </td> 
            <td>{{$Parties->party_name}} </td> 
            <td>{{$Parties->location}} </td> 
            <td>{{$Parties->details}} </td> 
            <td>{{$Parties->participants}} </td> 
            </tr>
    @endforeach

    
</body>
</html>
@endsection