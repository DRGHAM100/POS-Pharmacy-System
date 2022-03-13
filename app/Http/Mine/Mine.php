<?php

namespace App\Http\Mine;

use App\Models\supplier;
use App\Models\stocks;
use App\Models\sold;
use App\Models\User;
use Carbon\Carbon;
use Auth;


class Mine
{
    
    public function users(){
        return User::all();
    }

    public function suppliers(){
        return supplier::all();
    }

    public function sold($page){
        if($page == 'sellers')
            return sold::where('clean',1)->orderBy('id','DESC')->get();
        elseif($page == 'sale')
            return sold::where(['user_id' => Auth::id(),'clean' => 0])->orderBy('id','DESC')->get();
        else
            return true;
    } 

    public function soldAnalysis($page){ 
        if($page == 'sellers'){
            $lists = [
                'All Pieces'       => sold::where('clean',1)->sum('piece'),
                'All Pieces Today' => sold::where('clean',1)->whereDate('created_at',Carbon::now())->sum('piece'),
            ];
            return $lists;
        }else{
            return true;
        }            
    } 

    public function stock($page){ 
        if($page == 'notleft')
            return  stocks::where('count','<','2')->get();
        elseif($page == 'debtlist')
            return  stocks::where('is_debt',1)->get();
        elseif($page == 'expire')
            return  stocks::where('expire_date','<=',Carbon::today())->get();
        else
            return  stocks::with('one_supplier')->get();
    }
  
}
