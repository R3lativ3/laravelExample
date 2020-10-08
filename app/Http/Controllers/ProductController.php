<?php

namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact("products"));
    }
/*
    public function list(){

        $product = BD::select('select * from products ')
    }*/

    public function ProductoIndex($var)
    {
        $product = DB::select('select * from products where category_id = '.$var);
        return view('product.productIndex', compact("product"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::select('select * from categories');
        return view('product.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('image')){
            $file = $request->file('image');
            $nameFile = time().$file->getClientOriginalName();
            \Storage::disk('local')->put('public/'.$nameFile, \File::get($file) );
            
        }

        DB::table('products')->insert(
            ['product_name' => $request->name, 'product_price' => $request->price, 
            'product_description' => $request->desc, 'product_img' => time().$request->file('image')->getClientOriginalName(), 
            'category_id' => $request->category_id]
        );  
       // $res = DB::select('SELECT * FROM products ORDER BY id DESC LIMIT 1');
        
        return redirect()->action('ProductController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = product::find($id);
       // return view('')
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
