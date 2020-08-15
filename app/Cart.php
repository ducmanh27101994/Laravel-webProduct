<?php

namespace App;



class Cart
{
    public $items=[];
    public $totalPrice=0;
    public $totalQty=0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalPrice = $oldCart->totalPrice;
            $this->totalQty = $oldCart->totalQty;

        }
    }

    public function add($product)
    {
        $productStore = [
            "item" => $product,
            "totalQty" => 0,
            "totalPrice" => 0
        ];
        if ($this->items) {
            if (array_key_exists($product->id, $this->items)) {
                $productStore = $this->items[$product->id];
            }
        }
        $productStore['totalQty']++;
        $productStore['totalPrice'] += $product->price;
        $this->items[$product->id] = $productStore;
        $this->totalQty++;
        $this->totalPrice += $product->price;

    }

    public function remove($id)
    {
        if ($this->items) {
            $productsInCart = $this->items;
            if (array_key_exists($id, $productsInCart)) {
                $this->totalPrice -= $productsInCart[$id]['totalPrice'];
                $this->totalQty -= $productsInCart[$id]['totalQty'];
                unset($productsInCart[$id]);
                $this->items = $productsInCart;
            }
        }
    }

    public function update($request, $id)
    {

        if ($this->items) {
            $productsInCart = $this->items;
            if (array_key_exists($id, $productsInCart)) {
                $productUpdate = $productsInCart[$id];
                $qtyUpdate = $request->qty - $productUpdate['totalQty'];
                $this->totalQty += $qtyUpdate;
                $priceUpdate = $productUpdate['item']->price * $request->qty - $productUpdate['totalPrice'];
                $this->totalPrice += $priceUpdate;
                $productUpdate['totalQty'] = $request->qty;
                $productUpdate['totalPrice'] = $productUpdate['item']->price * $request->qty;
                $this->items[$id] = $productUpdate;
            }
        }
    }

}
