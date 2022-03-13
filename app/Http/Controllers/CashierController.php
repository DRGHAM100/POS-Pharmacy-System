<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Http\Requests\CashierRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;


class CashierController extends Controller
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

    public function addCashier(CashierRequest $request){
        $validated = $request->validated();

        $create_user = User::create([
            'name'      =>  $request->name,
            'email'     =>  $request->email,
            'password'  =>  Hash::make($request->password),
            'rule'      =>  $request->role
        ]);

        $create_user ? Session::flash('msg','Added Successfully')  : Session::flash('msg','Something went wrong');
        return redirect()->back();
        
    }
}
