<?php

namespace App\Http\Controllers\API;

use App\jadwal_kelas;
use Illuminate\Http\Request;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Jadwal_kelas as JadwalKelasResource;
use Illuminate\Support\Facades\Validator;

class JadwalKelasController extends BaseController
{
    public function index()
    {
        //
        $data = jadwal_kelas::all();

        return $this->sendResponse(
            JadwalKelasResource::collection($data),
            'jadwal_kelas berhasil diambil'
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

        $create = jadwal_kelas::create($data);

        return $this->sendResponse(
            new JadwalKelasResource($create),
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
        $data = jadwal_kelas::find($id);

        if (\is_null($data)) {
            return $this->sendError('jadwal_kelas Tidak dapat di temukan');
        }

        return $this->sendResponse(
            new JadwalKelasResource($data),
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
    public function update(Request $request, jadwal_kelas $product)
    {
        //
        $data = $request->all();

        $product->name = $data['name'];

        $product->detail = $data['detail'];

        $product->save();

        return $this->sendResponse(
            new JadwalKelasResource($product),
            'Produk Berhasil di Update'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(jadwal_kelas $product)
    {
        //
        $product->delete();

        return $this->sendResponse([], 'Produk Berhasil di Hapus');
    }
}
