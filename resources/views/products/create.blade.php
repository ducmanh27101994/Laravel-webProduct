@extends('CoreAdmin.admin')
@section('titte','Add')

@section('content')

<div class="container">
    <form enctype="multipart/form-data" method="post" action="{{route('products.store')}}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Product Name</label>
                <input type="text" name="product_name" class="form-control" placeholder="Product Name"
                       aria-describedby="emailHelp">

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Price</label>
                <input type="text" name="price" class="form-control" placeholder="Price" aria-describedby="emailHelp">

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Quantity</label>
                <input type="text" name="quantity" class="form-control" placeholder="Quantity" aria-describedby="emailHelp">

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Desc</label>
                <input type="text" name="desc" class="form-control" placeholder="Desc" aria-describedby="emailHelp">

            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Example file input</label>
                <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1">
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
