<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfilesController extends Controller
{
    public function index($userId)
    {
        $userInfo = User::findOrFail($userId);
        
        return view('profiles.index', [
            'user' => $userInfo
        ]); //put user -> view
    }
}
