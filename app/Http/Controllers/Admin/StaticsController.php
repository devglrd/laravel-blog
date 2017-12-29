<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StaticsController extends Controller
{
    const PATH_VIEW = 'admin.entities.static.';

    public function dashboard()
    {
        $this->isAdmin(Auth::user());
        return view(self::PATH_VIEW . 'dashboard')->with([
            'title' => 'Dashboard'
        ]);
    }

    public function isAdmin($user)
    {
        if ($user->getRole->role === 'admin'){
            return true;
        }else{
            return redirect()->back();
        }
    }
}
