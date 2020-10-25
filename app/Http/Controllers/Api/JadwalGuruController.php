<?php

namespace App\Http\Controllers\API;

use App\jadwal_guru;
use Illuminate\Http\Request;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Jadwal_guru as JadwalGuruResource;
use Illuminate\Support\Facades\Validator;

class JadwalGuruController extends BaseController
{
    public function index()
    {
        //
        $data = Jadwal_guru::all();

        return $this->sendResponse(
            JadwalGuruResource::collection($data),
            'Jadwal_guru berhasil diambil'
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

        $create = Jadwal_guru::create($data);

        return $this->sendResponse(
            new JadwalGuruResource($create),
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
        $data = Jadwal_guru::find($id);

        if (\is_null($data)) {
            return $this->sendError('Guru Tidak dapat di temukan');
        }

        return $this->sendResponse(
            new JadwalGuruResource($data),
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
    public function update(Request $request, Jadwal_guru $product)
    {
        //
        $data = $request->all();

        $product->name = $data['name'];

        $product->detail = $data['detail'];

        $product->save();

        return $this->sendResponse(
            new JadwalGuruResource($product),
            'Produk Berhasil di Update'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwal_Guru $product)
    {
        //
        $product->delete();

        return $this->sendResponse([], 'Produk Berhasil di Hapus');
    }
}
