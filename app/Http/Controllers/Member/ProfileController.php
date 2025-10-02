<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*************  ✨ Windsurf Command ⭐  *************/
/**
 * Display the user's profile page.
 *
 * @return \Illuminate\View\View
 */
/*******  44d79dc4-053d-4e3a-94be-21518c76dfb6  *******/class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('member.profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);

        $user->update($data);

        return back()->with('success', 'Profile updated successfully');
    }
}
