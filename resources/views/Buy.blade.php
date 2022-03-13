@extends('layouts.nav')
@section('content')
    <div class="container">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <h6 class="alert alert-danger mt-1">{{$error}}</h6>
            @endforeach
        @endif
        @if(Session::has('msg'))
         <h6 class="alert alert-success mt-1">{{ Session::get('msg') }}</h6>
        @endif
        <form action="{{ route('addStock') }}" method="post" class="text-center">
            @csrf
            <div class="row m-2 justify-content-center">
                <div class="col-lg-4">
                    <label for="id" class="text-white">Stocks Barcode</label>
                    <input type="text" name="id" id="id" class="form-control radius-20" placeholder="Stocks Barcode" required>
                </div>
                <div class="col-lg-4">
                    <label for="name" class="text-white">Stocks Name</label>
                    <input type="text" name="name" id="name" class="form-control radius-20" placeholder="Name" required>
                </div>
                <div class="col-lg-4">
                    <label for="supplier_id" class="text-white">Supplier</label>
                    <select name="supplier_id" id="supplier_id" class="form-control radius-20" required>
                        @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->company_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-4">
                    <label for="count" class="text-white">Stocks Count</label>
                    <input type="number" name="count" id="count" class="form-control radius-20"  placeholder="Count" required>
                </div>
                <div class="col-lg-4">
                    <label for="price" class="text-white">Stocks Price</label>
                    <input type="text" name="price" id="price" class="form-control radius-20"  placeholder="Price" required>
                </div>
                <div class="col-lg-4">
                    <label for="expire_date" class="text-white">Expire Date</label>
                    <input type="date" name="expire_date" id="expire_date" class="form-control radius-20"  placeholder="Expire Date" required>
                </div>
                <div class="col-lg-4">
                    <label for="is_debt" class="text-white">Is Debt</label>
                    <select name="is_debt" id="is_debt" class="form-control radius-20" required>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                    </select>
                </div>
                <div class="col-lg-4">
                    <label for="type" class="text-white">Type</label>
                    <select name="type" id="type" class="form-control radius-20" required>
                            <option value="0">Barcode</option>
                            <option value="1">Qrcode</option>
                    </select>
                </div>
            </div>
                <button type="submit" class="btn btn-dark w-50 mt-3 radius-20">Add</button> 
        </form>
        <hr>
        @include('layouts.card')
    </div>
@endsection