<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\guru;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Guru as GuruResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class GuruController extends BaseController
{
    public function index()
    {
        //
        $data = Guru::all();

        return $this->sendResponse(
            GuruResource::collection($data),
            'Guru berhasil diambil'
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
            Auth::guard('guru')->attempt(
                ['email' => $request->email, 'password' => $request->password],
                $request->remember
            )
        ) {
            return $this->sendResponse(Auth::guard('guru')->user(), 'Guru berhasil login');
        }
        return $this->sendError('Guru Gagal login');
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

        $create = Guru::create($data);

        return $this->sendResponse(
            new GuruResource($create),
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
        $data = Guru::find($id);

        if (\is_null($data)) {
            return $this->sendError('Guru Tidak dapat di temukan');
        }

        return $this->sendResponse(
            new GuruResource($data),
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
    public function update(Request $request, Guru $product)
    {
        //
        $data = $request->all();

        $product->name = $data['name'];

        $product->detail = $data['detail'];

        $product->save();

        return $this->sendResponse(
            new GuruResource($product),
            'Produk Berhasil di Update'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guru $product)
    {
        //
        $product->delete();

        return $this->sendResponse([], 'Produk Berhasil di Hapus');
    }
}
