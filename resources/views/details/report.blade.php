@extends('CoreAdmin.admin')
@section('tittle','Order Products')

@section('content')


    @extends('CoreAdmin.admin')
@section('tittle','Order Products')

@section('content')

    <div class="container">

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


                            <td><a href="{{route('details.byId')}}"></a></td>

                            <td>Not classified</td>

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





@endsection
