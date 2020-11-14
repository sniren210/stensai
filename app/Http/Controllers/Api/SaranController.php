<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\saran;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Saran as SaranResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SaranController extends BaseController
{
    public function index()
    {
        //
        $data = DB::table('saran')
            ->join('siswa', 'siswa.id', '=', 'saran.siswa_id')
            ->join('event', 'event.id', '=', 'saran.event_id')
            ->get();

        return $this->sendResponse($data, 'Saran berhasil diambil');
        // SaranResource::collection($data)
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

        $create = Saran::create($data);

        return $this->sendResponse(
            new SaranResource($create),
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
        $data = Saran::find($id);

        if (\is_null($data)) {
            return $this->sendError('Saran Tidak dapat di temukan');
        }

        return $this->sendResponse(
            new SaranResource($data),
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
    public function update(Request $request, Saran $product)
    {
        //
        $data = $request->all();

        $product->name = $data['name'];

        $product->detail = $data['detail'];

        $product->save();

        return $this->sendResponse(
            new SaranResource($product),
            'Produk Berhasil di Update'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Saran $product)
    {
        //
        $product->delete();

        return $this->sendResponse([], 'Produk Berhasil di Hapus');
    }
}
