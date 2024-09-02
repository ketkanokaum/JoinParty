@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Created Party</h1>
    <form action="{{ route('admin.parties.search') }}" method="POST">
        @csrf
        <input type="text" name="party_name" placeholder="Search Party Name">
        <button type="submit">Go</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Party Name</th>
                <th>Create Date</th>
                <th>Participants</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($parties as $party)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $party->name }}</td>
                <td>{{ $party->create_date }}</td>
                <td>{{ $party->participants }} / {{ $party->max_participants }}</td>
                <td>
                    <button class="party-button" data-id="{{ $party->id }}">
                        <i class="fa fa-wrench"></i>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<td>
    <button class="party-button" data-id="{{ $party->id }}">
        <i class="fa fa-wrench"></i>
    </button>
</td>


@endsection
