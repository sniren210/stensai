<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\kategori_post;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Kategori_post as Kategori_postResource;
use Illuminate\Support\Facades\Validator;

class KategoriPostController extends BaseController
{
    public function index()
    {
        //
        $data = Kategori_post::all();

        return $this->sendResponse(
            Kategori_postResource::collection($data),
            'Kategori_post berhasil diambil'
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

        $create = Kategori_post::create($data);

        return $this->sendResponse(
            new Kategori_postResource($create),
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
        $data = Kategori_post::find($id);

        if (\is_null($data)) {
            return $this->sendError('Kategori_post Tidak dapat di temukan');
        }

        return $this->sendResponse(
            new Kategori_postResource($data),
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
    public function update(Request $request, Kategori_post $product)
    {
        //
        $data = $request->all();

        $product->name = $data['name'];

        $product->detail = $data['detail'];

        $product->save();

        return $this->sendResponse(
            new Kategori_postResource($product),
            'Produk Berhasil di Update'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori_post $product)
    {
        //
        $product->delete();

        return $this->sendResponse([], 'Produk Berhasil di Hapus');
    }
}
