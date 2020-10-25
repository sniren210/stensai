<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Ajuan;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Ajuan as AjuanResource;

class AjuanController extends BaseController
{
    public function index()
    {
        //
        $data = Ajuan::all();

        return $this->sendResponse(
            AjuanResource::collection($data),
            'Ajuan berhasil diambil'
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

        $create = Ajuan::create($data);

        return $this->sendResponse(
            new AjuanResource($create),
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
        $data = Ajuan::find($id);

        if (\is_null($data)) {
            return $this->sendError('Ajuan Tidak dapat di temukan');
        }

        return $this->sendResponse(
            new AjuanResource($data),
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
    public function update(Request $request, Ajuan $product)
    {
        //
        $data = $request->all();

        $product->name = $data['name'];

        $product->detail = $data['detail'];

        $product->save();

        return $this->sendResponse(
            new AjuanResource($product),
            'Produk Berhasil di Update'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ajuan $product)
    {
        //
        $product->delete();

        return $this->sendResponse([], 'Produk Berhasil di Hapus');
    }
}
