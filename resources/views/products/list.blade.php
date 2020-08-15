@extends('CoreAdmin.admin')
@section('tittle','List Products')

@section('content')
    <div class="container">
<a href="{{route('products.create')}}">Add Product</a>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Products</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Desc</th>
            <th scope="col">Image</th>
            <th scope="col" colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>
        @if(empty($products))
            <tr>
                <td>No data</td>
            </tr>
        @else
        @foreach($products as $key => $product)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$product->product_name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->desc}}</td>
                <td><img style="width: 50px; height: 65px" src="{{asset('storage/'.$product->image)}}"></td>
                <td><a href="{{route('products.edit',$product->id)}}">Edit</a></td>
                <td><a href="{{route('products.delete',$product->id)}}">Delete</a></td>
            </tr>
        @endforeach
        @endif

        </tbody>
    </table>
    </div>
@endsection
