<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
   public function store(Request $request)
{
    if ($request->user()->profile) {
        return redirect()->route('dashboard')
            ->withErrors(['profile' => 'You already have a profile.']);
    }

    $profiledata = $request->validate([
        'last_name'  => 'required|string|max:255',
        'birth_date' => 'required|date',
        'bio'        => 'required|string',
    ]);

    $profiledata['first_name'] = $request->user()->name;

    $request->user()->profile()->create($profiledata);

    return redirect()->route('dashboard');
}
}
