<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\inputPenjualan;

class inputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = inputPenjualan::all();
        return response ()->json($data);
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
        $data = new inputPenjualan;
        $data->sales = $request->sales;
        $data->jumlah = $request->jumlah;
        $data->item = join(', ',$request->item);
        $data->save();
        return response()->json(['status'=>'benar', 'message'=>'data berhasil ditambah']);
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
        $collect = collect([1, 2, 3, 4]);
        $data = inputPenjualan::find($id);
        $data2 = inputPenjualan::where('id',$id)->get('item');
        $data3 = explode(',',$data->item);
        $array = collect($data3);
        // $collect = collect($data->item);
        return response()->json(['data'=>$data, 'array'=>$array]);
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
        $data = inputPenjualan::find($id);
        $data->sales = $request->sales;
        $data->jumlah = $request->jumlah;
        $data->item = join(', ',$request->item);
        $data->save();
        return response()->json(['status'=>'benar', 'message'=>'data berhasil diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = inputPenjualan::find($id);
        $data->delete();
        return response()->json(['status'=>'benar', 'message'=>'data berhasil dihapus']);

    }
}
