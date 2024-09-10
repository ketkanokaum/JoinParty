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

    
    <table border="1">
    <thead>
        <tr>
            <th >User ID</th>
            <th >email</th>
            <th >created dete</th>
            
        </tr>
    </thead>
    <tbody>
    <h2>Party</h2> 
    @foreach($users as $user)
            <tr>
            <td>{{$user->id}} </td> 
            <td>{{$user->email}} </td> 
            <td>{{$user->created_at}} </td> 
            </tr>
    @endforeach 
    @dd($users)
    
</body>
</html>
@endsection