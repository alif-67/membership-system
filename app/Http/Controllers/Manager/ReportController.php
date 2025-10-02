<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\User;

class ReportController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $byRole = User::with('roles')->get()->groupBy(fn($u) => $u->roles->pluck('name')->implode(', '));
        return view('manager.reports.index', compact('totalUsers', 'byRole'));
    }
}
