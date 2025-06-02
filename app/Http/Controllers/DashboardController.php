<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {

        $data = ['nama' => "hasna", 'foto' => 'hasna.jpeg'];
        return view('dashboard', compact('data'));
    }
}
