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
            'name' => 'eight_user',
            'email' => 'admin@eight-countries.com',
            'password' => Hash::make('cwb8usr$2025'), // ✅ Hashing password
        ]);
    }
}
