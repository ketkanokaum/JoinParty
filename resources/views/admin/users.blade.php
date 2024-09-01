@extends('layouts.app')

@section('content')
<div class="container">
    <h1>User Management</h1>
    <form action="{{ route('admin.users.search') }}" method="POST">
        @csrf
        <input type="text" name="email" placeholder="Search Email user">
        <button type="submit">Go</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Display Name</th>
                <th>Created Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->created_at }}</td>
                <td>
                    <a href="{{ route('admin.users.edit', $user->id) }}">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
