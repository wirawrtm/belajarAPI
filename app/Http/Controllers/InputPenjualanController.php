<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\inputPenjualan;
use App\Http\Requests\InputPenjualanStoreRequest;
use App\Http\Resources\InputPenjualanResource;
use App\Http\Resources\InputPenjualanResourceCollection;

class InputPenjualanController extends Controller
{
    public function index()
    {
        $inputPenjualans = inputPenjualan::all();
        return new InputPenjualanResourceCollection($inputPenjualans);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InputPenjualanStoreRequest $request)
    {
        $inputPenjualan = inputPenjualan::create([
            'sales' => $request->sales,
            'jumlah' => $request->jumlah,
            'item' => join(', ', $request->item)
        ]);
        
        return response()->json([
            'message' => 'Input penjualan successfully added.'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(inputPenjualan $inputPenjualan)
    {
        return new InputPenjualanResource($inputPenjualan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InputPenjualanStoreRequest $request, inputPenjualan $inputPenjualan)
    {
        $inputPenjualan->update([
            'sales' => $request->sales,
            'jumlah' => $request->jumlah,
            'item' => join(', ', $request->item)
        ]);
        
        return response()->json([
            'message' => 'Input penjualan successfully updated.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(inputPenjualan $inputPenjualan)
    {
        $inputPenjualan->delete();
        
        return response()->json([
            'message' => 'Input penjualan successfully deleted.'
        ]);
    }
}
