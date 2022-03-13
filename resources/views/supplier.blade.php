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
        <form action="{{ route('addSupplier') }}" method="post" class="text-center">
            @csrf
            <div class="row m-2 justify-content-center">
                <div class="col-lg-4">
                    <label for="company_name" class="text-white">Company Name</label>
                    <input type="text" name="company_name" id="company_name" class="form-control radius-20" placeholder="Name" required>
                </div>
                <div class="col-lg-4">
                    <label for="email" class="text-white">Company Email</label>
                    <input type="email" name="email" id="email" class="form-control radius-20"  placeholder="Email" required>
                </div>
                <div class="col-lg-4">
                    <label for="address" class="text-white">Company Address</label>
                    <input type="text" name="address" id="address" class="form-control radius-20"  placeholder="Address" required>
                </div>
                <div class="col-lg-4 mt-3">
                    <label for="phone" class="text-white">Company Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control radius-20"  placeholder="Phone" required>
                </div>
            </div>
                <button type="submit" class="btn btn-dark w-50 mt-3 radius-20">Add</button> 
        </form>
        <hr>
        <div class="row justify-content-center">
            @foreach($suppliers as $supplier)
            <div class="card text-center radius-20 m-2" style="width: 18rem;">
                <i class="ion-android-bus text-success" style="font-size:100px"></i>
                <div class="card-body">
                    <small class="card-title">Name: {{$supplier->company_name}}</small><br>
                    <small class="card-title">Email: {{$supplier->email}}</small><br>
                    <small class="card-title">Address: {{$supplier->address}}</small><br>
                    <small class="card-title">Phone: {{$supplier->phone}}</small><br>
                    <span class="btn btn-primary btn-sm" data-toggle="modal" data-target="#update{{$supplier->id}}">Edit</span>
                    <span class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{$supplier->id}}">Delete</span>
                </div>    
            </div>
            <!-- Modal Delete-->
            <div class="modal fade" id="delete{{$supplier->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <span>Do you want to delete {{$supplier->company_name}}</span>
                            <form action="{{url('supplierDelete')}}" method="post" class="mt-4">
                                @csrf
                                <button type="submit" class="btn btn-danger">Yes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <input type="hidden" name="id" value="{{$supplier->id}}"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Update-->
            <div class="modal fade" id="update{{$supplier->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                        <span>Update {{$supplier->company_name}}</span>
                            <form action="{{url('supplierUpdate')}}" method="post" class="mt-4">
                                @csrf
                                <input type="hidden" name="id" value="{{$supplier->id}}"/>
                                <input type="text" name="company_name" id="company_name" value="{{$supplier->company_name}}" class="form-control radius-20" placeholder="Name" required><br>
                                <input type="email" name="email" id="email" value="{{$supplier->email}}" class="form-control radius-20"  placeholder="Email" required><br>
                                <input type="text" name="address" id="address" value="{{$supplier->address}}" class="form-control radius-20"  placeholder="Address" required><br>
                                <input type="text" name="phone" id="phone" value="{{$supplier->phone}}" class="form-control radius-20"  placeholder="Phone" required><br>
                                <button type="submit" class="btn btn-success">Save</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
   </div>
@endsection