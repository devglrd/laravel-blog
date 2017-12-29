<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaticsController extends Controller
{
    const PATH_VIEW = 'admin.entities.static.';

    public function dashboard()
    {
        return view(self::PATH_VIEW . 'dashboard')->with([
            'title' => 'Dashboard'
        ]);
    }
}
