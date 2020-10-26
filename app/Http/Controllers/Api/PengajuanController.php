<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\pengajuan;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Pengajuan as pengajuanResource;

class PengajuanController extends BaseController
{
    public function index()
    {
        //
        $data = pengajuan::all();

        return $this->sendResponse(
            pengajuanResource::collection($data),
            'pengajuan berhasil diambil'
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

        $create = pengajuan::create($data);

        return $this->sendResponse(
            new pengajuanResource($create),
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
        $data = pengajuan::find($id);

        if (\is_null($data)) {
            return $this->sendError('pengajuan Tidak dapat di temukan');
        }

        return $this->sendResponse(
            new pengajuanResource($data),
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
    public function update(Request $request, pengajuan $product)
    {
        //
        $data = $request->all();

        $product->name = $data['name'];

        $product->detail = $data['detail'];

        $product->save();

        return $this->sendResponse(
            new pengajuanResource($product),
            'Produk Berhasil di Update'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(pengajuan $product)
    {
        //
        $product->delete();

        return $this->sendResponse([], 'Produk Berhasil di Hapus');
    }
}
