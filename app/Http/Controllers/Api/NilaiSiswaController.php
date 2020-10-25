<?php

namespace App\Http\Controllers\API;

use App\nilai_siswa;
use Illuminate\Http\Request;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Nilai_siswa as NilaiSiswaResource;
use Illuminate\Support\Facades\Validator;

class NilaiSiswaController extends BaseController
{
    public function index()
    {
        //
        $data = Nilai_siswa::all();

        return $this->sendResponse(
            NilaiSiswaResource::collection($data),
            'Nilai_siswa berhasil diambil'
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

        $create = Nilai_siswa::create($data);

        return $this->sendResponse(
            new NilaiSiswaResource($create),
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
        $data = Nilai_siswa::find($id);

        if (\is_null($data)) {
            return $this->sendError('Nilai_siswa Tidak dapat di temukan');
        }

        return $this->sendResponse(
            new NilaiSiswaResource($data),
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
    public function update(Request $request, Nilai_siswa $product)
    {
        //
        $data = $request->all();

        $product->name = $data['name'];

        $product->detail = $data['detail'];

        $product->save();

        return $this->sendResponse(
            new NilaiSiswaResource($product),
            'Produk Berhasil di Update'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nilai_siswa $product)
    {
        //
        $product->delete();

        return $this->sendResponse([], 'Produk Berhasil di Hapus');
    }
}
