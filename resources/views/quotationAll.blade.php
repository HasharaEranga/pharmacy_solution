@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-body">

            <h3>Quotation</h3>
                
        

                <table class = "table">
                    <tr>
                        <th>Prescriptions ID</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>

                    @foreach($data as $d)
                        <tr>
                            <td>{{$d->prescriptionId}}</td>
                            <td>
                                @if($d->status == '1')
                                    Pending
                                @elseif($d->status == '2')
                                    Approved
                                @elseif($d->status == '3')
                                    Rejeted
                                @endif
                            </td>

                            <td>
                                <a href = "/quotation-view/{{$d->prescriptionId}}">View</a>
                            </td>
                        
                        </tr>

                    @endforeach

                </table>


            </div>
            </div>
        </div>
    </div>
</div>
@endsection
