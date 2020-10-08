<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProviderController extends Controller
{
    public function index(){
        $providers = DB::select('select * from providers');
        return view('Provider.index', compact('providers'));
    }

    public function create(){
        return view('Provider.create');
    }

    public function store(Request $request){
        DB::table('providers')->insert(
            ['provider_name' => $request->provider, 'observations' => $request->observations]
        );
        return redirect()->action('ProviderController@index');
    }
}
