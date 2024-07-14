<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function AdminDashboard(){   //added

        return view('admins.admin_dashboard');
    }


}

