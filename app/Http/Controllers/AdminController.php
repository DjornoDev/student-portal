<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Student;

class AdminController extends Controller
{
    public function index()
    {
        $role = strtolower(Auth::user()->role);

        $data = [
            'message' => $role === 'super_admin' ? 'Welcome, Super Admin!' : 'Welcome, Admin!',
            'controls' => $role === 'super_admin'
                ? ['Manage Users', 'System Settings', 'Advanced Reports']
                : ['Manage Reports', 'View Data Summary'],
        ];

        return view('admins.dashboard', compact('data'));
    }
    public function subject()
    {
        return view('admins.subject');
    }

    public function schedule()
    {
        return view('admins.schedule');
    }

    public function student()
    {
        $students = Student::all();
        return view('admins.student', compact('students'));
    }

    public function teacher()
    {
        return view('admins.teacher');
    }

    public function noticeboard()
    {
        return view('admins.noticeboard');
    }
}
