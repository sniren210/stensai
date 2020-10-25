<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Event;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Event as EventResource;
use Illuminate\Support\Facades\Validator;

class EventController extends BaseController
{
    public function index()
    {
        //
        $data = Event::all();

        return $this->sendResponse(
            EventResource::collection($data),
            'Event berhasil diambil'
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

        $create = Event::create($data);

        return $this->sendResponse(
            new EventResource($create),
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
        $data = Event::find($id);

        if (\is_null($data)) {
            return $this->sendError('Event Tidak dapat di temukan');
        }

        return $this->sendResponse(
            new EventResource($data),
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
    public function update(Request $request, Event $product)
    {
        //
        $data = $request->all();

        $product->name = $data['name'];

        $product->detail = $data['detail'];

        $product->save();

        return $this->sendResponse(
            new EventResource($product),
            'Produk Berhasil di Update'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $product)
    {
        //
        $product->delete();

        return $this->sendResponse([], 'Produk Berhasil di Hapus');
    }
}
