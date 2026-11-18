<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetController extends Controller
{
    public function store(Request $request)
    {
        $petData = $request->validate([
            'name' => ['required', 'string'],
            'type' => ['required', 'string'],
        ]);

        $petData['user_id'] = Auth::id();

        Pet::create($petData);

        return redirect()->route('dashboard');
    }
}
