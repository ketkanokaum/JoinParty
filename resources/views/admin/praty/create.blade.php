@extends('layouts.app')

@section('content')
<div class="container">
    <h1>สร้างปาร์ตี้</h1>
    <form action="{{ route('admin.parties.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="date">วันที่จัดปาร์ตี้</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="form-group">
            <label for="name">ชื่อปาร์ตี้</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="location">สถานที่จัด</label>
            <input type="text" class="form-control" id="location" name="location" required>
        </div>
        <div class="form-group">
            <label for="type">ประเภทปาร์ตี้</label>
            <select class="form-control" id="type" name="type" required>
                <option value="ประเภท 1">ประเภท 1</option>
                <option value="ประเภท 2">ประเภท 2</option>
            </select>
        </div>
        <div class="form-group">
            <label for="participants">จำนวนผู้เข้าร่วม</label>
            <input type="number" class="form-control" id="participants" name="participants" required>
        </div>
        <div class="form-group">
            <label for="details">รายละเอียด</label>
            <textarea class="form-control" id="details" name="details" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="image1">เพิ่มรูปภาพ 1</label>
            <input type="file" class="form-control-file" id="image1" name="image1">
        </div>
        <div class="form-group">
            <label for="image2">เพิ่มรูปภาพ 2</label>
            <input type="file" class="form-control-file" id="image2" name="image2">
        </div>
        <div class="form-group">
            <label for="image3">เพิ่มรูปภาพ 3</label>
            <input type="file" class="form-control-file" id="image3" name="image3">
        </div>
        <button type="submit" class="btn btn-primary">ยืนยัน</button>
        <a href="{{ route('admin.parties.index') }}" class="btn btn-secondary">ยกเลิก</a>
    </form>
</div>
@endsection
