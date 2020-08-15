@extends('CoreAdmin.admin')
@section('tittle','Order Products')

@section('content')
<style>
    .form-control{
        margin-left: 10px;
        margin-right: 10px;
    }

</style>
    <div class="container">

        <form method="post" action="{{route('details.search')}}" class="form-inline">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlSelect1">Status: </label>
                <select name="keyword" class="form-control" id="exampleFormControlSelect1">
                    <option value="all">All</option>
                    <option value="pending">Pending</option>
                    <option value="delivering">Delivering</option>
                    <option value="success">Success</option>
                    <option value="cancel">Cancel</option>

                </select>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
        </form>



        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Order_Id</th>
                <th scope="col">Name</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
                <th scope="col">Total Price</th>
            </tr>
            </thead>
            <tbody>
            @if(empty($bills))
                <tr>
                    <td>No data</td>
                </tr>
            @else
                @foreach($bills as $key => $bill)
                    <tr>
                        <td> {{++$key}}</a></td>

                        @if($bill->customer)
                            <td><a href="{{route('details.byId',$bill->id)}}">#{{$bill->id}} - {{$bill->customer->customer_name}}</a></td>
                        @else
                            <td>Not classified</td>
                        @endif
                        <td>{{$bill->created_at}}</td>
                        <td>{{$bill->status}}</td>
                        <td>$ {{$bill->totalPrice}}</td>

                    </tr>
                @endforeach
            @endif

            </tbody>
        </table>
    </div>






@endsection
