<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusinessController extends Controller
{
    public function store(Request $request)
{
    $data = $request->validate([
        'name'        => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'owner_id'    => 'nullable|exists:users,id',
    ]);

    $business = Business::create([
        'name'        => $data['name'],
        'description' => $data['description'],
    ]);

   
    $owners = [$request->user()->id => ['active' => true]];

    
    if (!empty($data['owner_id'])) {
        $owners[$data['owner_id']] = ['active' => true];
    }

    $business->users()->attach($owners);

    return redirect()->route('dashboard');
}
}
