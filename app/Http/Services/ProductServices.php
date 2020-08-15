<?php


namespace App\Http\Services;


use App\Http\Repositories\ProductRepositories;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductServices
{
    protected $productRepo;

    function __construct(ProductRepositories $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    function getAll(){
        return $this->productRepo->getAll();
    }

    function store(Request $request){
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->desc = $request->desc;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $path = $image->store('images','public');
            $product->image = $path;
        }
        $this->productRepo->save($product);
    }

    function edit($id){
        return $this->productRepo->findById($id);
    }

    function update(Request $request,$id){
        $product = $this->productRepo->findById($id);
        $product->product_name = $request->product_name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->desc = $request->desc;

        if ($request->hasFile('image')){
            //xoa anh cu neu co
            $currentImg = $product->image;
            if ($currentImg){
                Storage::delete('/public'.$currentImg);
            }
            //cap nhat anh moi
            $image = $request->file('image');
            $path = $image->store('images','public');
            $product->image = $path;
        }
        $this->productRepo->save($product);
    }

    function delete($id){
        $product = $this->productRepo->findById($id);
        $product->delete();
    }
}
