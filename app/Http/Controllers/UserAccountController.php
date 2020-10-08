<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserAccountController extends Controller
{
    //

    public function index()
    {
        return view('UserAccount.index');
    }

    public function indexUsers(){
        $users = DB::select('select * from users');

        return view('UserAccount.indexUsers', compact('users'));
    }
}
