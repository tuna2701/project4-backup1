<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book;
use \Datetime;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function addToCart($id){
        
        // session()->flush();
        $book = book::find($id);
        $cart = session()->get('cart');
        if(isset($cart[$id])){
            $cart[$id]['qty'] = $cart[$id]['qty'] + 1;
            echo "<script>alert('Thêm sản phẩm thành công')</script>";
            // return $cart;

        } else {
            $cart[$id] = [
                'id' => $book->id,
                'name' => $book->name,
                'price' => $book->disc_price,
                'qty' => 1,
                'image' => $book->image   
            ];
            echo "<script>alert('Thêm sản phẩm thành công')</script>";
            // return $cart;

        }
        session()->put('cart', $cart);
        
        // return redirect('/');
        // return back();
        // echo "<pre>";
        // print_r(session()->get('cart'));
    }

    public function addToCart2($id, $qty){
        
        // session()->flush();
        $book = book::find($id);
        $cart = session()->get('cart');
        if(isset($cart[$id])){
            $cart[$id]['qty'] = $cart[$id]['qty'] + $qty;
            echo "<script>alert('Thêm sản phẩm thành công')</script>";
            // return $cart;

        } else {
            $cart[$id] = [
                'id' => $book->id,
                'name' => $book->name,
                'price' => $book->disc_price,
                'qty' => $qty,
                'image' => $book->image   
            ];
            echo "<script>alert('Thêm sản phẩm thành công')</script>";
            // return $cart;


        }
        session()->put('cart', $cart);
        
        // return redirect('/');
        // return back();
        // echo "<pre>";
        // print_r(session()->get('cart'));
    }

    public function showCart() {
        $carts = session()->get('cart');
        return view('local.cart', compact('carts'));
        // return $carts;
    }

    public function getCart() {
        $carts = session()->get('cart');
        // return view('local.cart', compact('carts'));
        return $carts;
    }

    public function deleteFromCart($id) {
        $cart = session()->get('cart');
        foreach ($cart as $index => $product) {
            if ($product['id'] == $id) {
               unset($cart[$index]);
            }
        }
        session(['cart' => $cart]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function saveOrder() {
        $cart = session()->get('cart');
        $customer = session()->get('customer');
        foreach ($cart as $product) {
            $sum += $product["price"];
        }   
        // if(!$cart){
        //     echo "<script>alert('Lỗi thêm vào csdl')</script>";
        // } else {
        //     // $db = new order();
        //     // $db->id_kh = $customer->id;
        //     // $db->date_order = new Datetime();
            

        // }
        return $sum;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
