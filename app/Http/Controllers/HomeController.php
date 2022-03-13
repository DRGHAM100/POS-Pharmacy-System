<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Mine\Mine;


class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($page)
    {
        $cashiers  =  Mine::users();
        $suppliers =  Mine::suppliers();
        $sold      =  Mine::sold($page);
        $soldList  =  Mine::soldAnalysis($page);
        $stocks    =  Mine::stock($page); 
          
        if(view()->exists($page))
            return view($page,compact('cashiers','suppliers','stocks','sold','soldList'));
        else 
            return view('404');
    }
 
}
