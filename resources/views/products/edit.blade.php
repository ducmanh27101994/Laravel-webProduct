
<div class="container">
    <form method="post" action="">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Product Name</label>
            <input type="text" name="product_name" class="form-control" value="{{$product->product_name}}"
                   aria-describedby="emailHelp">

        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Price</label>
            <input type="text" name="price" class="form-control" placeholder="Price" value="{{$product->price}}">

        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Quantity</label>
            <input type="text" name="quantity" class="form-control" value="{{$product->quantity}}" aria-describedby="emailHelp">

        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Desc</label>
            <input type="text" name="desc" class="form-control" value="{{$product->desc}}" aria-describedby="emailHelp">

        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Example file input</label>
            <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


