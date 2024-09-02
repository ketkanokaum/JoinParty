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
<!-- Modal -->
<div id="reportModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">รายละเอียดการรายงานผู้ใช้งาน</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>อีเมลของผู้ใช้ที่รายงาน:</strong> <span id="reporterEmail"></span></p>
                <p><strong>ชื่อ - นามสกุล:</strong> <span id="reporterName"></span></p>
                <p><strong>อีเมลของผู้ใช้ที่โดนรายงาน:</strong> <span id="reportedEmail"></span></p>
                <p><strong>ชื่อ - นามสกุล:</strong> <span id="reportedName"></span></p>
                <p><strong>หมายเหตุ:</strong> <span id="reportNote"></span></p>
                <p><strong>วันที่และเวลาที่รายงาน:</strong> <span id="reportDate"></span></p>
                <p><strong>แนบรูปหลักฐาน:</strong> <span id="reportImage"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    $('.report-button').click(function(){
        var reportId = $(this).data('id');
        $.ajax({
            url: '/admin/reports/' + reportId,
            method: 'GET',
            success: function(data) {
                $('#reporterEmail').text(data.reporter_email);
                $('#reporterName').text(data.reporter_name);
                $('#reportedEmail').text(data.reported_email);
                $('#reportedName').text(data.reported_name);
                $('#reportNote').text(data.note);
                $('#reportDate').text(data.created_at);
                $('#reportImage').attr('src', data.image_url);
                $('#reportModal').modal('show');
            }
        });
    });
});
</script>
<td>
    <button class="report-button" data-id="{{ $report->id }}">
        <i class="fa fa-wrench"></i>
    </button>
</td>


@endsection
