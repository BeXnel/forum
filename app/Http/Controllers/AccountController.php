<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AccountController extends Controller
{
    public function show()
    {
        $data = User::all();

        return view('account_panel', compact('data'));
    }
}
