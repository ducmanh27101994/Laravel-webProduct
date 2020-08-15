<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Cart;

use App\Customer;
use App\Detail;
use App\Http\Services\CustomerServices;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //
    protected $product;
    protected $customerServices;
    protected $billServices;

    function __construct(Product $product
                            )
    {
        $this->product = $product;
    }

    function addCart($id)
    {
        $product = $this->product->findOrFail($id);
        $oldCart = Session::get('cart');

        $newCart = new Cart($oldCart);
        $newCart->add($product);

        Session::put('cart', $newCart);
        toastr()->success('Add products to cart successfully', 'Miracle Max Says');

        return back();
    }



    function index()
    {
        $cart = Session::get('cart');
        return view('shop-cart', compact('cart'));
    }

    function delete($id)
    {
        if (Session::has('cart')) {
            $oldCart = Session::get('cart');
            if (count($oldCart->items) > 0) {
                $cart = new Cart($oldCart);
                $cart->remove($id);
                Session::put('cart', $cart);
                toastr()->success('Product deleted in the shopping cart', 'Success');
            } else{
                toastr()->error('You have not bought any products.', 'Delete_error!');
            }

        }else{
            toastr()->error('You have not bought any products.', 'Delete_error!');
        }
        return back();
    }

    public function update(Request $request, $idProduct)
    {
        if (Session::has('cart')) {
            $oldCart = Session::get('cart');
            if (count($oldCart->items) > 0) {
                $cart = new Cart($oldCart);
                $cart->update($request, $idProduct);
                Session::put('cart', $cart);
                $message = 'cập nhật giỏ hàng thành công';
            } else {
                $message = 'Bạn chưa mua sản phẩm nào';
            }
        } else {
            $message = 'Bạn chưa mua sản phẩm nào';
        }

        $data = [
            'productUpdate' => Session::get('cart')->items[$idProduct],
            'message' => $message,
            'totalPriceCart' => Session::get('cart')->totalPrice
        ];

        return response()->json($data);
    }


    function checkOut(){
        $cart = Session::get('cart');

        return view('checkout',compact('cart'));
    }

    function placeOder(Request $request){
        $cart = Session::get('cart');
        $customer = new Customer();
        $customer->customer_name = $request->customer_name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->save();

        $bill = new Bill();
        $bill->totalPrice = $cart->totalPrice;
        $bill->note = $request->note;
        $bill->status = 'Pending';
        $bill->customer_id = $customer->id;
        $bill->save();

        foreach ($cart->items as $key=>$product){
            $details = new Detail();
            $details->bill_id = $bill->id;
            $details->product_id = $key;
            $details->quantityOrder = $product['totalQty'];
            $details[$key] = $details->save();
        }

        Session::forget('cart');
        return redirect()->route('home');
    }


}
