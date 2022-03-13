<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Http\Requests\SoldRequest;
use Illuminate\Http\Request;
use App\Models\stocks;
use App\Models\sold;
use Auth;

class SaleController extends Controller
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

    public function checkPermissionBeforeClean($id){
        return sold::where(['user_id'=> Auth::id(),'id' => $id])->count();
    }

    public function check(Request $request){
        $stock = stocks::find($request->id);
        if(!$stock)
            return 'The Product Not Found';
        if($stock->count == '0')
            return 'The Product No Longer Available';
        if($stock->expire_date < \Carbon\Carbon::today())
            return 'The Product Is Expired';
    
        return 'Ok';
    }


    public function sale(SoldRequest $request){    
        $stock = stocks::find($request->stock_id);

        if($stock->count < $request->piece){
            Session::flash('msg','There are not enough quantities'); 
            return redirect()->back();
        }

        $sold = sold::create([
            'user_id' => Auth::id(),
            'stock_id' => $request->stock_id,
            'clean'   => 0,
            'piece' => $request->piece,      
        ]);

        stocks::where('id',$request->stock_id)->decrement('count',$request->piece);

        return redirect()->back();
    }

    public function clean($id){
        $permission = $this->checkPermissionBeforeClean($id);
        
        if($permission > 0)
            sold::where('id',$id)->update(['clean' => 1]);
        
        return redirect()->back();
    }
}
