@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-body">

            <h3>Add prescription</h3>
                
                        <form action  = "" method = "post" enctype = "multipart/form-data">
                            @csrf

                            <TABLE>
                                <tr>
                                    <td>Note</td>
                                    <td><textarea name="note" rows="10"></textarea></td>
                                </tr>

                                <tr>
                                    <td>Delivery address</td>
                                    <td><textarea name="address" rows="10"></textarea></td>
                                </tr>


                                <tr>
                                    <td>Delivery time</td>
                                    <td>
                                        <select name = "time">
                                            <option value="00:00">00:00</option>
                                            <option value="02:00">02:00</option>
                                            <option value="04:00">04:00</option>
                                            <option value="06:00">06:00</option>
                                            <option value="08:00">08:00</option>
                                            <option value="10:00">10:00</option>
                                            <option value="12:00">12:00</option>
                                            <option value="14:00">14:00</option>
                                            <option value="16:00">16:00</option>
                                            <option value="18:00">18:00</option>
                                            <option value="20:00">20:00</option>
                                            <option value="22:00">22:00</option>
                                            <option value="24:00">24:00</option>
                                        </select>
                                    </td>
                                </tr>
                                

                                <tr>
                                    <td>
                                        images
                                    </td>
                                    <td>
                                        <input type="file" name = 'img[]' multiple>
                                    </td>
                                </tr>

                                <tr>
                                    <td><button>Submit</button></td>
                                </tr>



                            </TABLE>



                        </form>





            </div>
            </div>
        </div>
    </div>
</div>
@endsection
