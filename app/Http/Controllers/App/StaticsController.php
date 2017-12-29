<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StaticsController extends Controller
{
    const PATH_VIEW = 'app.entities.static.';

    public function index()
    {
        return view(self::PATH_VIEW . 'index')->with([
           'title' => 'Home'
        ]);
    }

    public function logout(){
        Auth::logout();
        return redirect()->back();
    }
}
