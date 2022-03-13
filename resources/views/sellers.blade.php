@extends('layouts.nav')
@section('content')
    <div class="m-2">
        @foreach($soldList as $key => $value)
            <span class="btn btn-light m-2">{{$key}}: {{$value}}</span>
        @endforeach
    </div>
    @include('layouts.Table')
@endsection