<?php


namespace App\Http\Repositories;


use App\Product;

class ProductRepositories
{
    protected $product;

    function __construct(Product $product)
    {
        $this->product = $product;
    }

    function getAll(){
        return $this->product->select('*')->orderBy('id','desc')->paginate(9);
    }

    function save($product){
        $product->save();
    }

    function findById($id){
        return $this->product->findOrFail($id);
    }

}
