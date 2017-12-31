<?php

namespace App\Http\Controllers\App;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function confirmAccount()
    {
        $id = Auth::user()->id;
        User::where('id', $id)->update([
            'fk_role' => 2
        ]);
        return redirect()->back();
    }
}
