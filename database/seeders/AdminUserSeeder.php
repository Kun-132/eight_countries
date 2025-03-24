<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdminUser;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        AdminUser::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('pmm123'), // ✅ Hashing password
        ]);
    }
}
