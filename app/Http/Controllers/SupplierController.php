<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Http\Requests\SupplierRequest;
use Illuminate\Http\Request;
use App\Models\supplier;

class SupplierController extends Controller
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


    public function addSupplier(SupplierRequest $request){
        $validated = $request->validated();
      
        $create_supplier = supplier::create([
            'company_name' =>  $request->company_name,
            'email'        =>  $request->email,
            'address'      =>  $request->address,
            'phone'        =>  $request->phone
        ]);

        $create_supplier ? Session::flash('msg','Added Successfully')  : Session::flash('msg','Something went wrong');
        return redirect()->back();
        
    }

    public function supplierUpdate(SupplierRequest $request){
        supplier::find($request->id)->update([
            'company_name' =>  $request->company_name,
            'email'        =>  $request->email,
            'address'      =>  $request->address,
            'phone'        =>  $request->phone
        ]);
        return redirect()->back();
    }

    public function supplierDelete(Request $request){
        supplier::find($request->id)->delete();
        return redirect()->back();
    }
}
