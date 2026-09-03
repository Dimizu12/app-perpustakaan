<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return 'Admin Dashboard';
    }

    public function info()
    {
        return 'Admin Information';
    }

    public function settings()
    {
        return 'Admin Settings';
    }

    public function users()
    {
        return 'Admin Users';
    }
}
