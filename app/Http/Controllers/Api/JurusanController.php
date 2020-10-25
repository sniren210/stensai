<?php

namespace App\Http\Controllers\API;

use App\jurusan;
use Illuminate\Http\Request;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Jurusan as JurusanResource;
use Illuminate\Support\Facades\Validator;

class JurusanController extends BaseController
{
    public function index()
    {
        //
        $data = Jurusan::all();

        return $this->sendResponse(
            JurusanResource::collection($data),
            'Jurusan berhasil diambil'
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

        $create = Jurusan::create($data);

        return $this->sendResponse(
            new JurusanResource($create),
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
        $data = Jurusan::find($id);

        if (\is_null($data)) {
            return $this->sendError('Jurusan Tidak dapat di temukan');
        }

        return $this->sendResponse(
            new JurusanResource($data),
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
    public function update(Request $request, Jurusan $product)
    {
        //
        $data = $request->all();

        $product->name = $data['name'];

        $product->detail = $data['detail'];

        $product->save();

        return $this->sendResponse(
            new JurusanResource($product),
            'Produk Berhasil di Update'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jurusan $product)
    {
        //
        $product->delete();

        return $this->sendResponse([], 'Produk Berhasil di Hapus');
    }
}
