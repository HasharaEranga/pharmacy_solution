<!DOCTYPE html>
<html>
<head>
</head>

<body>

    <h1>{{ $details['title'] }}</h1>

    <h3>Quotation</h3>

    <p>Prescription ID - {{$details['id']}}</p>


        <table class="table" >
            <tr>
                <th>Drug</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
            <?php $tot = 0; ?>
            @foreach($details['data'] as $d)
                                
                <?php $tot += (int)$d['ip_'];  ?>
                <tr>
                    <td>{{$d['name']}}</td>
                    <td>{{$d['qty']}}</td>
                    <td>{{$d['ip_']}}</td>
                </tr>

            @endforeach

                <tr>
                    <td></td>
                    <th>Total</th>
                    <th>{{$tot}}</th>
                </tr>
        </table>

    <p>Thank you</p>

</body>

</html>