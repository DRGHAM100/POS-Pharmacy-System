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
        <form action="{{ route('addCashier') }}" method="post" class="text-center">
            @csrf
            <div class="row m-2 justify-content-center">
                <div class="col-lg-4">
                    <label for="name" class="text-white">Cashier Name</label>
                    <input type="text" name="name" id="name" class="form-control radius-20" placeholder="Name" required>
                </div>
                <div class="col-lg-4">
                    <label for="email" class="text-white">Cashier Email</label>
                    <input type="email" name="email" id="email" class="form-control radius-20"  placeholder="Email" required>
                </div>
                <div class="col-lg-4">
                    <label for="password" class="text-white">Cashier Password</label>
                    <input type="text" name="password" id="password" class="form-control radius-20"  placeholder="Password" required>
                </div>
                <div class="col-lg-4 mt-3">
                    <label for="role" class="text-white">Cashier Role</label>
                    <select name="role" id="role" class="form-control radius-20" required>
                        <option value="0">Cashier</option>
                        <option value="1">Admin</option>
                    </select>
                </div>
            </div>
                <button type="submit" class="btn btn-dark w-50 mt-3 radius-20">Add</button> 
        </form>
        <hr>
        <div class="row justify-content-center">
            @foreach($cashiers as $cashier)
            <div class="card text-center radius-20 m-2" style="width: 18rem;">
                <i class="ion-person text-success" style="font-size:100px"></i>
                <div class="card-body">
                    <small class="card-title">Name: {{$cashier->name}}</small><br>
                    <small class="card-title">Email: {{$cashier->email}}</small><br>
                    <small class="card-title">Role: {{$cashier->rule == 1 ? 'Admin' : 'Cashier'}}</small><br>
                </div>
            </div>
            @endforeach
        </div>
   </div>
@endsection