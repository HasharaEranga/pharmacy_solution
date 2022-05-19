@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">


                   <a href = "/prescription">Prescription</a>
                   <br>
                   @if(Auth::user()->type == '1')
                   <a href = "/prescription-add">Prescription Add</a>
                   <br>
                   @endif
                   <a href = "/quotation">quotation</a>
                   <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
