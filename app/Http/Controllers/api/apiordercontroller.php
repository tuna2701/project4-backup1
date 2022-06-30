<?php
namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\orders;
use App\Models\customers;
use App\Models\order_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Datetime;
use Illuminate\Support\Facades\Session;
class apiordercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        return orders::with('customers')
            ->orderBy('date_order', 'desc')
            ->where('status','!=','Huỷ')    
            ->get();
        // return orders::all();
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $db = new orders();
        $db->date_order = new Datetime();
        $db->tong_tien=$request->tong_tien;
        $db->payment="on";
        $db->id_kh=$request->id_kh;
        $db->address=$request->address;
        $db->status="Chưa giao";
        $db->note= null;
        $db->save();
        foreach($request->bill_detail as $s){
            $ct = new order_detail();
            $ct->id_sp = $s['id_sp'];
            $ct->qty = $s['qty'];
            $ct->order_id =  $db->id;
            $ct->thanh_tien = $s['thanh_tien'];
            $ct->save();
        }
        return $db;
    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show($id, $id2)
    {
        //
        $customerInfo = DB::table('customers')
                        ->join('orders', 'customers.id', '=', 'orders.id_kh')
                        ->select('customers.*', 'orders.date_order', 'orders.id as order_id', 'orders.tong_tien as order_total', 'orders.note as order_note', 'orders.status as order_status')
                        ->where('customers.id', '=', $id)
                        ->first();

        $orderInfo = DB::table('orders')
                    ->join('order_detail', 'orders.id', '=', 'order_detail.order_id')
                    ->leftjoin('book', 'order_detail.id_sp', '=', 'book.id')
                    ->where('orders.id', '=', $id2)
                    ->select('orders.*', 'order_detail.*', 'book.name as product_name', 'book.disc_price as price')
                    ->get();
                    
        $this->data['customerInfo'] = $customerInfo;
        $this->data['orderInfo'] = $orderInfo;

        // session()->put('order_detail', $this->data);
        return $this->data;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $bill = orders::find($id);
        $bill->status = $request->input('status');
        // $bill->status = $request->status;
        $bill->save();

        return $bill;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $bill = orders::find($id);
        $bill->delete();
        Session::flash('message', "Successfully deleted");

        return "Deleted";
    }
}
