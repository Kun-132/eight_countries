<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\AdminUser;

class AdminUserController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Find admin user by email
    $admin = AdminUser::where('email', $request->email)->first();

    if (!$admin) {
        return back()->withErrors(['email' => 'Admin user not found']);
    }

    // Check if the entered password matches the hashed password in DB
    if (!Hash::check($request->password, $admin->password)) {
        return back()->withErrors(['password' => 'Incorrect password']);
    }

    // Login the admin user manually
    Auth::guard('admin')->login($admin);

    return redirect()->route('admin.home'); // Redirect to home page after login
}

    

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
