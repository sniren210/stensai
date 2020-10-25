<?php

namespace App\Http\Controllers\API;

use App\jadwal_ruang;
use Illuminate\Http\Request;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Jadwal_ruang as JadwalRuangResource;
use Illuminate\Support\Facades\Validator;

class JadwalRuangController extends BaseController
{
    public function index()
    {
        //
        $data = jadwal_ruang::all();

        return $this->sendResponse(
            JadwalRuangResource::collection($data),
            'jadwal ruang berhasil diambil'
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

        $create = jadwal_ruang::create($data);

        return $this->sendResponse(
            new JadwalRuangResource($create),
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
        $data = jadwal_ruang::find($id);

        if (\is_null($data)) {
            return $this->sendError('jadwal_ruang Tidak dapat di temukan');
        }

        return $this->sendResponse(
            new JadwalRuangResource($data),
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
    public function update(Request $request, jadwal_ruang $product)
    {
        //
        $data = $request->all();

        $product->name = $data['name'];

        $product->detail = $data['detail'];

        $product->save();

        return $this->sendResponse(
            new JadwalRuangResource($product),
            'Produk Berhasil di Update'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(jadwal_ruang $product)
    {
        //
        $product->delete();

        return $this->sendResponse([], 'Produk Berhasil di Hapus');
    }
}
