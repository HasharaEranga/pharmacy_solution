@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-body">

            <h3>Prescription</h3>
                
        

                <table class = "table">
                    <tr>
                        <th>ID</th>
                        <th>Note</th>
                        <th>Delivery Address</th>
                        <th>Delivery Time</th>

                    </tr>

                    @foreach($data as $d)
                        <tr>
                            <td>{{$d->id}}</td>
                            <td>{{$d->note}}</td>
                            <td>{{$d->address}}</td>
                            <td>{{$d->time}}</td>
                            @if(Auth::user()->type == '2')
                            <td><a href ="/quotation-add/{{$d->id}}">Add Quatetion</td>
                            @endif
                        </tr>


                    @endforeach



                </table>





            </div>
            </div>
        </div>
    </div>
</div>
@endsection
