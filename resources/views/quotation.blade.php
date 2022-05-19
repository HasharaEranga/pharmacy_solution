@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-body">

                <h3>Quotation</h3>

                <p>Prescription ID - {{$id}}</p>

                <div class="row">
        
                        
                        <div class="col-md-6">
                            <table class="table" >
                                <tr>
                                    <th>Drug</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                                <?php $tot = 0; ?>
                                @foreach($data as $d)

                                <?php $tot += (int)$d->price;  ?>
                                <tr>
                                    <td>{{$d->name}}</td>
                                    <td>{{$d->qty}}</td>
                                    <td>{{$d->price}}</td>
                                </tr>

                                 @endforeach

                                <tr>
                                    <td></td>
                                    <th>Total</th>
                                    <th>{{$tot}}</th>
                                </tr>


                            </table>
                        </div>
                </div>


                <div class="row">
                    @if($data[0]->status == '1' && Auth::user()->type == "1")
                    <div class="col-md-3">
                        <a href = '/quotation-approved/{{$id}}'>Approved</a>
                    </div>

                    <div class="col-md-3">
                        <a href = '/quotation-reject/{{$id}}'>Reject</a>
                    </div>
                    @elseif($data[0]->status == '2')
                        Approved

                    @elseif($data[0]->status == '3')
                        Reject
                    @endif
                </div>

        

            </div>
            </div>
        </div>
    </div>
</div>
@endsection
