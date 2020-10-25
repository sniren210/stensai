<?php

namespace App\Http\Controllers\API;

use App\wali_kelas;
use Illuminate\Http\Request;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Wali_kelas as WaliKelasResource;
use Illuminate\Support\Facades\Validator;

class WaliKelasController extends BaseController
{
    public function index()
    {
        //
        $data = wali_kelas::all();

        return $this->sendResponse(
            WaliKelasResource::collection($data),
            'wali_kelas berhasil diambil'
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

        $create = wali_kelas::create($data);

        return $this->sendResponse(
            new WaliKelasResource($create),
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
        $data = wali_kelas::find($id);

        if (\is_null($data)) {
            return $this->sendError('wali_kelas Tidak dapat di temukan');
        }

        return $this->sendResponse(
            new WaliKelasResource($data),
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
    public function update(Request $request, wali_kelas $product)
    {
        //
        $data = $request->all();

        $product->name = $data['name'];

        $product->detail = $data['detail'];

        $product->save();

        return $this->sendResponse(
            new WaliKelasResource($product),
            'Produk Berhasil di Update'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(wali_kelas $product)
    {
        //
        $product->delete();

        return $this->sendResponse([], 'Produk Berhasil di Hapus');
    }
}
