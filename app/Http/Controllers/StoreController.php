<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    public function index(){
        $stores = DB::select('select a.store_name, a.store_phone,  a.store_address, a.store_email, a.id, sum(b.quantity) as c, count(b.product_id) as d 
        from stores a, stocks b  where a.id = b.store_id group by a.store_name, a.store_phone, a.store_address, a.store_email, a.id');
        return view('Store.index', compact("stores"));
    }

    public function stockProductList(?string $id){
        $products = DB::select('select b.product_name, b.product_price, c.category_name, b.product_img, a.quantity  
                                from stocks a, products b, categories c  where a.product_id = b.id and c.id = b.category_id and a.store_id ='.$id);
        if($products == null){
            $products = "empty";
        }
        return view('Store.stockProduct', compact("products"));
    }

    public function create(){
        $city = DB::select('select * from cities');
        return view('Store.create', compact("city"));
    }

    public function addStockToStore(){
        $store = DB::select('select * from stores');
        $products = DB::select('select * from products');
        return view('Store.addStockToStore', compact("store"), compact("products"));
    }
    
    public function sucursales(){
        return view('Store.sucursales');
    }

    public function storeStock(Request $request){
        DB::table('stocks')->insert(
            ['store_id' => $request->store_id, 'product_id' => $request->product_id, 
             'certification_number' => $request->certificacion, 'quantity' => $request->quantity]
        );
        
        $res = DB::select('SELECT * FROM stocks ORDER BY id DESC LIMIT 1');
        return redirect()->action('StoreController@index');
    }

    public function store(Request $request){

        DB::table('stores')->insert(
            ['store_name' => $request->storeName, 'store_phone' => $request->storePhone, 
             'store_email' => $request->storeEmail,'store_address' => $request->storeAddress,
             'city_id' => $request->city_id]
        );  

        $res = DB::select('SELECT * FROM stores ORDER BY id DESC LIMIT 1');
        dd($res);
    }
}
