<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class InputPenjualanResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = $this->collection->transform(function ($inputPenjualan) {
            return [
                'id' => $inputPenjualan->id,
                'sales' => $inputPenjualan->sales,
                'jumlah' => $inputPenjualan->jumlah,
                'item' => $inputPenjualan->item
            ];
        });

        return $data;
    }
}
