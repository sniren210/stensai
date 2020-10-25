<?php

namespace App\Http\Controllers\API;

use App\ruang;
use Illuminate\Http\Request;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Ruang as RuangResource;
use Illuminate\Support\Facades\Validator;

class RuangController extends BaseController
{
    public function index()
    {
        //
        $data = Ruang::all();

        return $this->sendResponse(
            RuangResource::collection($data),
            'Ruang berhasil diambil'
        );
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
        $data = $request->all();

        $create = Ruang::create($data);

        return $this->sendResponse(
            new RuangResource($create),
            'Produk Berhasil di buat'
        );
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
        $data = Ruang::find($id);

        if (\is_null($data)) {
            return $this->sendError('Ruang Tidak dapat di temukan');
        }

        return $this->sendResponse(
            new RuangResource($data),
            'Produk berhasil diambil'
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ruang $product)
    {
        //
        $data = $request->all();

        $product->name = $data['name'];

        $product->detail = $data['detail'];

        $product->save();

        return $this->sendResponse(
            new RuangResource($product),
            'Produk Berhasil di Update'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ruang $product)
    {
        //
        $product->delete();

        return $this->sendResponse([], 'Produk Berhasil di Hapus');
    }
}
