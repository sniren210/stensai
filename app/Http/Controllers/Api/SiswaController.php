<?php

namespace App\Http\Controllers\API;

use App\siswa;
use Illuminate\Http\Request;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Siswa as SiswaResource;
use Illuminate\Support\Facades\Auth;

class SiswaController extends BaseController
{
    public function index()
    {
        //
        $data = Siswa::all();

        return $this->sendResponse(
            SiswaResource::collection($data),
            'Siswa berhasil diambil'
        );
    }

    public function login(Request $request)
    {
        // Validate form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Attempt to log the user in
        if (
            Auth::guard('siswa')->attempt(
                ['email' => $request->email, 'password' => $request->password],
                $request->remember
            )
        ) {
            return $this->sendResponse(Auth::guard('siswa')->user(), 'Siswa berhasil login');
        }
        return $this->sendError('Siswa Gagal login');
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

        $create = Siswa::create($data);

        return $this->sendResponse(
            new SiswaResource($create),
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
        $data = Siswa::find($id);

        if (\is_null($data)) {
            return $this->sendError('Siswa Tidak dapat di temukan');
        }

        return $this->sendResponse(
            new SiswaResource($data),
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
    public function update(Request $request, Siswa $product)
    {
        //
        $data = $request->all();

        $product->name = $data['name'];

        $product->detail = $data['detail'];

        $product->save();

        return $this->sendResponse(
            new SiswaResource($product),
            'Produk Berhasil di Update'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $product)
    {
        //
        $product->delete();

        return $this->sendResponse([], 'Produk Berhasil di Hapus');
    }
}
