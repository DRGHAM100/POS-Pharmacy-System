<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Http\Requests\StocksRequest;
use Illuminate\Http\Request; 
use App\Models\stocks;

class StocksController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    } 

    public function addStock(StocksRequest $request){
        $validated = $request->validated();
      
        $create_stock = stocks::create([
            'id'          =>  $request->id,
            'name'        =>  $request->name,
            'supplier_id' =>  $request->supplier_id,
            'count'       =>  $request->count,
            'price'       =>  $request->price,
            'expire_date' => $request->expire_date,
            'is_debt'     => $request->is_debt,
            'type'        => $request->type,
        ]);

        $create_stock ? Session::flash('msg','Added Successfully')  : Session::flash('msg','Something went wrong');
        return redirect()->back();
        
    }

    public function stockUpdate(StocksRequest $request){
        stocks::find($request->id)->update([
            'name'        =>  $request->name,
            'supplier_id' =>  $request->supplier_id,
            'count'       =>  $request->count,
            'price'       =>  $request->price,
            'expire_date' => $request->expire_date,
            'is_debt'     => $request->is_debt,
        ]);
        return redirect()->back();
    }

    public function stockDelete(Request $request){
        stocks::find($request->id)->delete();
        return redirect()->back();
    } 
}
