@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Report Management</h1>
    <form action="{{ route('admin.reports.search') }}" method="POST">
        @csrf
        <input type="text" name="email" placeholder="Search Email user">
        <button type="submit">Go</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>User Email</th>
                <th>Report Email</th>
                <th>Report Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $report)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $report->user_email }}</td>
                <td>{{ $report->report_email }}</td>
                <td>{{ $report->report_date }}</td>
                <td>
                    <a href="{{ route('admin.reports.edit', $report->id) }}">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
