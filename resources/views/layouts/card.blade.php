<div class="row justify-content-center">
    
    @foreach($stocks as $stock)
            <div class="card text-center radius-20 m-2" style="width: 18rem;">
                @if($stock->is_debt != 0)
                <span class="btn btn-warning btn-sm radius-10 mt-1 mf-1 text-white" style="width:50%;">Debt !</span>
                @else
                <span class="btn btn-warning btn-sm radius-10 mt-1 mf-1 text-white" style="width:50%;visibility:hidden">Debt !</span>
                @endif
                <!-- <i class="ion-cube text-success" style="font-size:100px"></i> -->
                <div class="mt-5" style="min-height:50px">
                @if($stock->type == 0)
                    {!! DNS1D::getBarcodeSVG("$stock->id", 'EAN13',1,43,'dark',true) !!}
                @else
                    {!! DNS2D::getBarcodeSVG("$stock->id", 'QRCODE') !!}
                @endif
                </div>
                <div class="card-body text-left">
                    <small class="card-title">Barcode: {{$stock->id}}</small><br>
                    <small class="card-title">Name: {{$stock->name}}</small><br>
                    <small class="card-title">Supplier: {{$stock->one_supplier->company_name}}</small><br>
                    <small class="card-title">Price: {{number_format($stock->price,2)}}</small><br>
                    <small class="card-title">Count: {{$stock->count}}</small><br>
                    <small class="card-title">Expire: {{date('d-m-Y', strtotime($stock->expire_date))}}</small><br>
                    <small class="card-title">Created At: {{date('d-m-Y', strtotime($stock->created_at))}}</small><br>
                    <span class="btn btn-primary btn-sm mt-1" data-toggle="modal" data-target="#update{{$stock->id}}">Edit</span>
                    <span class="btn btn-danger btn-sm mt-1" data-toggle="modal" data-target="#delete{{$stock->id}}">Delete</span>
                </div>    
            </div>
            <!-- Modal Delete-->
            <div class="modal fade" id="delete{{$stock->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <span>Do you want to delete {{$stock->name}}</span>
                            <form action="{{url('stockDelete')}}" method="post" class="mt-4">
                                @csrf
                                <button type="submit" class="btn btn-danger">Yes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <input type="hidden" name="id" value="{{$stock->id}}"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Update-->
            <div class="modal fade" id="update{{$stock->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                        <span>Update {{$stock->name}}</span>
                            <form action="{{url('stockUpdate')}}" method="post" class="mt-4">
                                @csrf
                                <input type="text" name="id" value="{{$stock->id}}" class="form-control radius-20" placeholder="Barcode" required/><br>
                                <input type="text" name="name" id="name" value="{{$stock->name}}" class="form-control radius-20" placeholder="Name" required><br>
                                <select name="supplier_id" id="supplier_id" class="form-control radius-20" required>
                                    @foreach($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}" {{ $stock->supplier_id == $supplier->id ? 'selected' : ''}}>{{ $supplier->company_name }}</option>
                                    @endforeach
                                </select><br>
                                <input type="number" name="count" id="count" value="{{$stock->count}}" class="form-control radius-20"  placeholder="Count" required> <br>
                                <input type="text" name="price" id="price" value="{{$stock->price}}" class="form-control radius-20"  placeholder="Phone" required><br>
                                <input type="date" name="expire_date" id="expire_date" value="{{$stock->expire_date}}" class="form-control radius-20"  placeholder="Expire Date" required><br>
                                <select name="is_debt" id="is_debt" class="form-control radius-20" required>
                                    <option value="0" {{ $stock->is_debt == 0 ? 'selected' : ''}}>No</option>
                                    <option value="1" {{ $stock->is_debt == 1 ? 'selected' : ''}}>Yes</option>
                                </select> <br>
                                <select name="type" id="type" class="form-control radius-20" required>
                                    <option value="0" {{ $stock->type == 0 ? 'selected' : ''}}>Barcode</option>
                                    <option value="1" {{ $stock->type == 1 ? 'selected' : ''}}>Qrcode</option>
                                </select> <br>
                                <button type="submit" class="btn btn-success">Save</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    @endforeach
</div>