<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
{
    // Check if the request is from the admin and redirect accordingly
    if ($request->is('admin/*')) {
        return route('admin.login');  // Admin login route
    }
    
    // Default login route for other parts of the application
    return route('login');  
}

}
