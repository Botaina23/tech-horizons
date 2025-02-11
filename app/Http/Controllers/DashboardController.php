<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $selectedThemes = $user->themes; // Fetch the user's selected themes using the relationship
    
        return view('subAllThemes', compact('selectedThemes'));
    }
}
