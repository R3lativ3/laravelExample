<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserAdministratorController extends Controller
{
    public function create(){
        return view('Administrator.create');
    }

    public function store(Request $request){
        DB::table('users')->insert(
            ['name' => $request->name, 'email' => $request->mail, 
             'password' => $request->psw]
        );
        $res = DB::select('SELECT * FROM users ORDER BY id DESC LIMIT 1');
        $date = Carbon::now();
        $date = $date->format('Y-m-d');
        DB::table('userAdmin')->insert(
            ['id' => $res[0]->id, 'rol' => 'administrator', 
             'date' => $date]
        );
        return redirect()->action('UserAdministratorController@index');
    }

    public function index(){
        $users = DB::select('select *  from users a, userAdmin b where a.id in (select id from userAdmin) and a.id = b.id;');
        return view('Administrator.index', compact("users"));
    }

    public function login(){
        return view('Administrator.login');
    }

    public function confirmData(Request $request){
        $userxx = DB::select("select *  from users a, userAdmin b where a.id in (select id from userAdmin) and a.id = b.id  and a.password = '".$request->psw."'");

        if(count($userxx) > 1){
            session()->push('administrador', $userxx[0]->id);
            return redirect('/');
        }

        return redirect('loginX');

    }
}

