<table class="table table-light mt-5 table-borderless table-responsive-sm text-center">
        <thead>
            <tr>
            <th scope="col">Cashier</th>
            <th scope="col">Barcode</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Expire Date</th>
            <th scope="col">Created At</th>
            <th scope="col">Sold At</th>
            <th scope="col">Piece</th>
            @if(Request::segment('1') == 'sale')
            <th scope="col">Clean</th>
            @endif
            </tr>
        </thead>
        <tbody>
            @foreach($sold as $_sold)
                <tr>
                    <th scope="row">{{$_sold->cashier->name}}</th>
                    <td>
                        @if($_sold->stock->type == 0)
                            {!! DNS1D::getBarcodeSVG("$_sold->stock_id", 'EAN13',1,37,'dark',false) !!}
                        @else
                            {!! DNS2D::getBarcodeSVG("$_sold->stock_id", 'QRCODE') !!}
                        @endif
                    </td>
                    <td>{{$_sold->stock->name}}</td>
                    <td>{{number_format($_sold->stock->price,2)}}</td>
                    <td>{{date('d-m-Y', strtotime($_sold->stock->expire_date))}}</td>
                    <td>{{date('d-m-Y', strtotime($_sold->stock->created_at))}}</td>
                    <td>{{date('d-m-Y', strtotime($_sold->created_at))}}</td>
                    <td class="bg-dark text-light border border-light;" style="vertical-align: middle">{{$_sold->piece}}</td>
                    @if(Request::segment('1') == 'sale')
                    <td class="bg-danger text-light border border-light;" style="vertical-align: middle"><a href="{{ url('/clean/' . $id=$_sold->id) }}" class="text-light"> Clean</a></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
</table>