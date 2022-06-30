<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\book;
use Illuminate\Http\Request;
use \Datetime;
// use Illuminate\Support\Facades\DB;
class apibookcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return book::with('category','publisher')->get();
        // return book::all();
        
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

    public function get_detail($id) {
        // $detail = book::with('category','publisher')
        //         ->where('id', '=', $id)
        //         ->get();
        // $this->data['detail'] = $detail;
        // return $this->data;

        return book::with('category','publisher')->find($id);
    }

    public function get_related_book($id) {
        $book = book::find($id);
        return book::with('category','publisher')
                ->where('category_id','=', $book->category_id)
                ->where('id','!=',$id)
                ->take(4)
                ->get();
    }


    public function get_new_book() {
        return book::with('category','publisher')
                ->orderBy('created_at', 'desc')
                // ->take(10)
                ->get();
    }

    public function get_new_book_filter($cat_id, $pub_id) {
        return book::with('category','publisher')
                ->where('category_id', '=', $cat_id)
                ->where('publisher', '=', $pub_id)
                ->orderBy('created_at', 'desc')
                // ->take(10)
                ->get();
    }

    public function get_new_book_filter1($cat_id) {
        return book::with('category','publisher')
                ->where('category_id', '=', $cat_id)
                ->orderBy('created_at', 'desc')
                // ->take(10)
                ->get();
    }

    public function get_new_book_filter2($pub_id) {
        return book::with('category','publisher')
                ->where('publisher', '=', $pub_id)
                ->orderBy('created_at', 'desc')
                ->get();
    }

    public function get_book_cat($id) {
        // $book = book::find($id);
        return book::with('category','publisher')
                ->where('category_id','=', $id)
                // ->where('id','!=',$id)
                ->orderBy('created_at', 'desc')
                // ->take(5)
                ->get();
    }
    
    public function get_book_topsell($id) {
        // $book = book::find($id);
        return book::with('category','publisher')
                ->join('order_detail', 'book.id', '=', 'order_detail.id_sp')
                ->where('category_id','=', $id)
                ->orderBy('order_detail.qty','DESC')
                ->take(10)
                ->get();
    }

    public function get_book_topseller() {
        // $book = book::find($id);
        return book::with('category','publisher')
                ->join('order_detail', 'book.id', '=', 'order_detail.id_sp')
                ->orderBy('order_detail.qty','DESC')
                // ->take(4)
                ->get();
    }

    public function get_book_search($searchText) {
        // $book = book::find($id);
        return book::with('category','publisher')
                ->where('name','like', "%$searchText%")
                // ->take(4)
                ->get();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $db = new book();
        $db->name = $request->name;
        $db->category_id = $request->category_id;
        $db->author = $request->author;
        $db->translator = $request->translator;
        $db->desc = $request->desc;
        $db->unit_price = $request->unit_price;
        $db->disc_price = $request->disc_price;
        $db->qty = $request->qty;
        $db->publisher = $request->publisher;
        $db->page = $request->page;
        $db->edition = $request->edition;
        $db->format = $request->format;
        $db->weight = $request->weight;
        $db->new_flag = $request->new_flag;
        $db->image = $request->image;
        $db->created_at = new Datetime();
        $db->save();
        $res = book::with('category', 'publisher')->find($db->id);
        return $res;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return book::findOrFail($id);
        // return book::with('category','publisher')
        //         ->where('id', '=', $id)
        //         ->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $db = book::find($id);
        $db->name = $request->name;
        $db->category_id = $request->category_id;
        $db->author = $request->author;
        $db->translator = $request->translator;
        $db->desc = $request->desc;
        $db->unit_price = $request->unit_price;
        $db->disc_price = $request->disc_price;
        $db->qty = $request->qty;
        $db->publisher = $request->publisher;
        $db->page = $request->page;
        $db->edition = $request->edition;
        $db->format = $request->format;
        $db->weight = $request->weight;
        $db->new_flag = $request->new_flag;
        $db->image = $request->image;
        $db->updated_at = new Datetime();
        $db->save();
        $res = book::with('category', 'publisher')->find($id);

        return $res;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        book::findOrFail($id)->delete();
        return "Deleted";
    }
}
