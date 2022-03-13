<div class="row m-3 justify-content-center">
    <div class="col-lg-4 col-12 text-center mt-1"><br>
        <select class="form-control" id="camera-select"></select>
        <button title="Play" class="btn btn-light btn-block mt-1" id="play" type="button" data-toggle="tooltip">Play</button><br>
        <canvas width="320" height="240" id="webcodecam-canvas"></canvas>
        <span class="notify text-center"></span><br>
    </div>
    <div class="col-lg-4 col-12 text-left">
        <form action="{{route('SaleProduct')}}" method="post">
            @csrf 
            <div class="form-group">
                <label for="stock_id">Barcode</label>
                <input type="text" name="stock_id" id="barcode" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="piece">Peice</label>
                <input type="number" name="piece" id="piece" class="form-control" required>
            </div>
            <button class="btn btn-light btn-block">Sale</button>
        </form>
        @if(Session::has('msg'))
            <h6 class="alert alert-danger mt-1">{{ Session::get('msg') }}</h6>
        @endif
    </div>
</div>
  