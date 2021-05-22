<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DB;
use Prophecy\Exception\Doubler\ReturnByReferenceException;

class Page extends Controller
{
    public function index()
    {
        $count = 'dupa';

        return view('count', compact('count'));
    }
}
