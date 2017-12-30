<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StaticsController extends Controller
{
    const PATH_VIEW = 'admin.entities.static.';

    public function dashboard()
    {
        //dd(Auth::user()->getRole->role != 'admin');
        if ($this->isAdmin()){

            $users = $this->getAllMember();

            $userConfirm = $this->getUserConfirm()->count();

            return view(self::PATH_VIEW . 'dashboard')->with([
                'title' => 'Dashboard',
                'users' => $users,
                'userConfirm' => $userConfirm
            ]);
        }else{
            return redirect()->back();
        }
    }

    public function isAdmin()
    {
        if (Auth::user()->getRole->role != 'Admin'){
            return false;
        }else{
            return true;
        }
    }
    public function getAllMember(){
        $users = User::orderBy('name', 'desc')->paginate(25);

        return $users;
    }

    public function getUserConfirm()
    {
        $users = User::all()->where('fk_role', '>', '1');

        return $users;
    }
}
