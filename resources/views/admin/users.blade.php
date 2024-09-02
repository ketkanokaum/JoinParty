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
<!-- Modal -->
<div id="userModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">บัญชีผู้ใช้งาน</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>อีเมลของผู้ใช้:</strong> <span id="userEmail"></span></p>
                <p><strong>ชื่อ:</strong> <span id="userName"></span></p>
                <p><strong>เบอร์โทรศัพท์:</strong> <span id="userPhone"></span></p>
                <p><strong>นามสกุล:</strong> <span id="userSurname"></span></p>
                <p><strong>รายละเอียดเพิ่มเติม:</strong> <span id="userDetails"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
    $(document).ready(function(){
        $('.user-button').click(function(){
            var userId = $(this).data('id');
            $.ajax({
                url: '/admin/users/' + userId,
                method: 'GET',
                success: function(data) {
                    $('#userEmail').text(data.email);
                    $('#userName').text(data.name);
                    $('#userPhone').text(data.phone);
                    $('#userSurname').text(data.surname);
                    $('#userDetails').text(data.details);
                    $('#userModal').modal('show');
                }
            });
        });
    });
</script>
<td>
    <button class="user-button" data-id="{{ $user->id }}">
        <i class="fa fa-wrench"></i>
    </button>
</td>

@endsection
