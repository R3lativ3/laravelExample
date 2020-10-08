<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserWelcome;
use App\Models\quote;
use App\Models\quote_detail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ShoppingCart extends Controller
{
    

    public function all(Request $request){

        $request->session()->push('test', '1');


        return $request->session()->get('test');
    }

    public function generarPdf(){
       $res = DB::select('SELECT id FROM orders ORDER BY id DESC LIMIT 1');
        $orderx = DB::select('select d.name, a.address, d.email, a.date from orders a, order_details b, products c, users d  where a.id = b.order_id and c.id = b.product_id and d.id = a.user_id and a.id ='.$res[0]->id);
        $details = DB::select('select c.id, c.product_name, b.quantity, c.product_price  from orders a, order_details b, products c  where a.id = b.order_id and c.id = b.product_id and a.id = '.$res[0]->id);  
        $recarga = DB::select('select * from recargas where order_id ='.$res[0]->id);
        session()->forget('order');
        $item = [
            'id' => $res[0]->id,
            'name' => $orderx[0]->name,
            'address' => $orderx[0]->address,
            'email' => $orderx[0]->email,
            'date' => $orderx[0]->date
        ];
        session()->push('order', $item);
        return \PDF::loadView('Order.OrderPdf',compact('details'), compact('recarga'))->download('CompraEconoGuate.pdf');

    }

    public function storeShop(Request $request){

        $date = Carbon::now();
        $date = $date->format('Y-m-d');
        $user = auth()->user();
        DB::table('orders')->insert(
            ['date' => $date , 'user_id' => $user->id, 'address' => $request->address]
        );

        $res = DB::select('SELECT id FROM orders ORDER BY id DESC LIMIT 1');
        foreach(session()->get('cartX') as $lel){
            $dataSet[] = [
                'quantity'  => $lel['cant'],
                'product_id'    => $lel['id'],
                'order_id'       => $res[0]->id,
            ];
        }

        DB::table('order_details')->insert($dataSet);

        if($request->company == '1'){
            DB::table('recargas')->insert(
                ['order_id' => $res[0]->id, 'date' => $date, 'number' => $request->number, 'company' => 'Claro', 'amount' => $request->amount]
            );
        }else if($request->company == '2'){
            DB::table('recargas')->insert(
                ['order_id' => $res[0]->id, 'date' => $date, 'number' => $request->number, 'company' => 'Tigo', 'amount' => $request->amount]
            );
        }else if($request->company == '3'){
            DB::table('recargas')->insert(
                ['order_id' => $res[0]->id, 'date' => $date, 'number' => $request->number, 'company' => 'Tuenti', 'amount' => $request->amount]
            );
        }

        if($request->company == '1' || $request->company == '2' || $request->company == '3'){
            $recarga = DB::select('select * from recargas where order_id ='.$res[0]->id);
        }
        $orderx = DB::select('select d.name, a.address, d.email, a.date from orders a, order_details b, products c, users d  where a.id = b.order_id and c.id = b.product_id and d.id = a.user_id and a.id ='.$res[0]->id);
        $details = DB::select('select c.id, c.product_name, b.quantity, c.product_price  from orders a, order_details b, products c  where a.id = b.order_id and c.id = b.product_id and a.id = '.$res[0]->id);  
        $request->session()->forget('order');
        $item = [
            'name' => $orderx[0]->name,
            'address' => $orderx[0]->address,
            'email' => $orderx[0]->email,
            'date' => $orderx[0]->date
        ];
        session()->push('order', $item);
        //return \PDF::loadView('Order.OrderDetail', compact('details'), compact('recarga'))->download('ejemplo.pdf');
       // return $pdf->download('ejemplo.pdf');
       session()->forget('cartX');
        return view('Order.OrderDetail', compact('details'), compact('recarga'));
    }
    
    public function addToCart(Request $request){

        $item = [
            'id' => $request->id,
            'img' => $request->img,
            'cant' => $request->cant,
            'desc' => $request->desc,
            'nomb' => $request->nomb,
            'price' => $request->price
        ];

        $request->session()->push('cartX', $item);
        //return redirect()->action('ProductController@index');
        return redirect('productsCategory/1');
    }

    public function clearShop(){
        session()->forget('cartX');
        return redirect('productsCategory/1');
    }

    public function index(){
        return view('ShoppingCart.index');
    }

    public function emailCotizacion(){
        return view('ShoppingCart.cotizacion');
    }

    public function email(){
        $user = auth()->user();
            $data["email"] = $user->email;
            $data["client_name"] = $user->name;
            $data["subject"] = "";
        

        $quote = quote::create([
            'email_client' => $data["email"],
            'quote_date' => now()->toDateTimeString('Y-m-d') 
        ]);
        $quote->save();
        session()->push('idCotizacion', $quote->id);

        $pdf = \PDF::loadView('ShoppingCart.cotizacion');

        try{
            Mail::send('ShoppingCart.cotizacion', $data, function($message)use($data,$pdf) {
            $message->to($data["email"], $data["client_name"])
            ->subject($data["subject"])
            ->attachData($pdf->output(), "invoice.pdf");
            });

            $dataSet = [];
            foreach(session()->get('cartX') as $lel){
                $dataSet[] = [
                    'quantity'  => $lel['cant'],
                    'product_id'    => $lel['id'],
                    'quote_id'       => $quote->id,
                ];
            }
    
            DB::table('quote_details')->insert($dataSet);
        }catch(JWTException $exception){
            $this->serverstatuscode = "0";
            $this->serverstatusdes = $exception->getMessage();
        }
        if (Mail::failures()) {
             $this->statusdesc  =   "Error sending mail";
             $this->statuscode  =   "0";

        }else{

           $this->statusdesc  =   "Message sent Succesfully";
           $this->statuscode  =   "1";
        }
        return redirect()->action('ProductController@index');

    
    }

    public function email2(Request $request){
        $data["email"] = $request->correo;
        $data["client_name"] = $request->nombre;
        $data["subject"] = "Cotizacion EconoGuate";
        
        $quote = quote::create([
            'email_client' => $request->correo,
            'quote_date' => date('Y-m-d H:i:s')
        ]);
        $quote->save();
        session()->push('idCotizacion', $quote->id);

        $pdf = \PDF::loadView('ShoppingCart.cotizacion');

        try{
            Mail::send('ShoppingCart.cotizacion', $data, function($message)use($data,$pdf) {
            $message->to($data["email"], $data["client_name"])
            ->subject($data["subject"])
            ->attachData($pdf->output(), "invoice.pdf");
            });

            $dataSet = [];
            foreach(session()->get('cartX') as $lel){
                $dataSet[] = [
                    'quantity'  => $lel['cant'],
                    'product_id'    => $lel['id'],
                    'quote_id'       => $quote->id,
                ];
            }
    
            DB::table('quote_details')->insert($dataSet);
        }catch(JWTException $exception){
            $this->serverstatuscode = "0";
            $this->serverstatusdes = $exception->getMessage();
        }
        if (Mail::failures()) {
             $this->statusdesc  =   "Error sending mail";
             $this->statuscode  =   "0";

        }else{

           $this->statusdesc  =   "Message sent Succesfully";
           $this->statuscode  =   "1";
        }
        return redirect()->action('ProductController@index');

    
    }

    public function insert($email){
        $user = auth()->user();
        $quote = quote::create([
            'email_client' => $email,
            'quote_date' => date('Y-m-d H:i:s')
        ]);
        $quote->save();
        $dataSet = [];
        foreach(session()->get('cartX') as $lel){
            $dataSet[] = [
                'quantity'  => $lel['cant'],
                'product_id'    => $lel['id'],
                'quote_id'       => $quote->id,
            ];
        }

        DB::table('quote_details')->insert($dataSet);
    }

}

