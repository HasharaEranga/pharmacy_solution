@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-body">

                <h3>Add quotation</h3>
                    
                    <div class = "row">
                        <div class="col-md-6">


                            <div class="row mb-4">
                                <div class="col-md-12">
                                    Prescription
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-12">
                                    Note - 
                                    <br>
                                    {{$data->note}}
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-12">
                                    Delivery Addresss - 
                                    <br>
                                    {{$data->address}}

                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-12">
                                    Delivery Time - 
                                    <br>
                                    {{$data->time}}

                                </div>
                            </div>

                            <div class="row mb-2">

                                @foreach($img as $i)
                                <div class="col-md-2">
                                    <a href = "/image/{{$i->url}}" target = "_blank"><img src="/image/{{$i->url}}" style="width: 100%;"></a>
                                </div>
                                @endforeach

                            </div>

                        </div>



                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table" >
                                        <tr>
                                            <th>Drug</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                        </tr>

                                        <tbody id = "tbl">
  
                                        </tbody>

                                        
                                        <tr>
                                            <td></td>
                                            <th>Total</th>
                                            <th id = "price">00.00</th>
                                        </tr>


                                    </table>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-5">
                                    Drug - 
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id = "drug">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-5">
                                    Quantity - 
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id = "qty">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-5">
                                   
                                </div>
                            <div class="col-md-7" style="text-align:center">
                                    <button onclick="add()">Add</button>
                                </div>
                            </div>



                        </div>

                        <input type="hidden" name = "" id = "items">
                        <hr>


                        <div class="row">
                            <div class="col-md-12" style="text-align:right ;">
                                <button onclick="submit()">Send Quotation</button>
                            </div>
                        </div>


                    </div>





                </div>
            </div>
        </div>
    </div>
</div>




<script>

    var price = 0.00;

    var item = [];

    function add(){
        var name = document.getElementById("drug").value;
        var qty = document.getElementById("qty").value;

        var ip = qty.split("x")[0];
        var qt = qty.split("x")[1];

        ip_ = parseInt(ip) * parseInt(qt);

        price += parseInt(ip_);

        item.push({name, qty, ip_});

        document.getElementById("tbl").innerHTML += "<tr><td>"+name+"</td><td>"+qty+"</td><td>"+ip_+"</td></tr>";
        document.getElementById("price").innerHTML = price;

        document.getElementById("drug").value = "";
        document.getElementById("qty").value= "";
        

    }


    function submit(){

        $.ajax({ 
        type: 'POST', 
        url: '/quotation-send', 
        data: { "_token": "{{ csrf_token() }}", 'id':'{{$data->id}}', 'data':item}, 
        //dataType: 'json',
        success: function (data) { 
            
            if(data == '1'){
                window.location.href = '/';
            }
        }
        });

    }

    
    

</script>








@endsection
