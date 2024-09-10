<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin Name',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),  // รหัสผ่านที่ถูกแฮช
            'is_admin' => true,  // กำหนดให้เป็น Admin
        ]);
    }
}
//php artisan db:seed --class=AdminUserSeeder //เพิ่มข้อมูล Admin
