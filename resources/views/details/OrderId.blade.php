@extends('CoreAdmin.admin')
@section('tittle','Order Products')

@section('content')
    <style>
        .table:not(.table-dark) {
            text-align: center;
        }
    </style>

    <div class="container">

        <h3>Order Id: # {{$bill->id}} detail</h3>
        <br>

        <form action="{{route('details.update',$bill->id)}}" method="post">
            @csrf
            <h2>General</h2>

            <div class="form-group">
                <label for="exampleInputEmail1">Date created:</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       value="{{$bill->created_at}}" readonly>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Status</label>
                <select class="form-control" name="status">
                    <option value="Pending" @if($bill->status == "Pending")
                    selected
                        @endif>
                        Pending
                    </option>
                    <option value="Delivering" @if($bill->status == "Delivering" )
                    selected
                        @endif>
                        Delivering
                    </option>
                    <option value="Success" @if($bill->status == "Success" )
                    selected
                        @endif>
                        Success
                    </option>
                    <option value="Cancel" @if($bill->status == "Cancel" )
                    selected
                        @endif>
                        Cancel
                    </option>
                </select>
            </div>

            <table id="table-id" class="table table-striped">
                <thead class="thead-dark">
                <tr>
                    <th>Information</th>
                    <th>Desc</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th>Name</th>
                    <td>{{$bill->customer->customer_name}}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>0{{$bill->customer->phone}}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{$bill->customer->address}}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{$bill->customer->email}}</td>
                </tr>
                <tr>
                    <th>Note</th>
                    <td>{{$bill->note}}</td>
                </tr>
                </tbody>
                <br>
            </table>

            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col" colspan="2">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                </tr>
                </thead>
                <tbody>

                @foreach($details as $key => $detail)
                    <tr>
                        <th scope="row"><img style="width: 50px; height: 65px"
                                             src="{{asset('storage/'.$detail->image)}}"></th>
                        <td>{{$detail->product_name}}</td>
                        <td>$ {{$detail->price}}</td>
                        <td>{{$detail->quantityOrder}}</td>
                        <td>$ {{$detail->price * $detail->quantityOrder}}</td>
                    </tr>
                @endforeach
                <tr>

                    <td rowspan="4">
                        <button type="submit" class="btn btn-success">Update</button>
                    </td>
                    <td rowspan=""></td>
                    <td rowspan=""></td>
                    <td rowspan=""></td>
                    <td rowspan="4">Total Price: $ {{$bill->totalPrice}}</td>
                </tr>
                </tbody>

            </table>

        </form>


    </div>
    <br>
    <br>
@endsection
