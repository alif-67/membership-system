<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\User;

class ApprovalController extends Controller
{
    public function index()
    {
        // สมมติว่ามี status = pending ใน users table
        $pendingMembers = User::role('member')->where('status', 'pending')->get();
        return view('staff.approvals.index', compact('pendingMembers'));
    }

    public function approve(User $user)
    {
        $user->update(['status' => 'approved']);
        return back()->with('success', 'Member approved successfully');
    }
}
