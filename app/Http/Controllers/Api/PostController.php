<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\post;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Post as PostResource;
use Illuminate\Support\Facades\Validator;

class PostController extends BaseController
{
    public function index()
    {
        //
        $data = Post::all();

        return $this->sendResponse(
            PostResource::collection($data),
            'Post berhasil diambil'
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

        $create = Post::create($data);

        return $this->sendResponse(
            new PostResource($create),
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
        $data = Post::find($id);

        if (\is_null($data)) {
            return $this->sendError('Post Tidak dapat di temukan');
        }

        return $this->sendResponse(
            new PostResource($data),
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
    public function update(Request $request, Post $product)
    {
        //
        $data = $request->all();

        $product->name = $data['name'];

        $product->detail = $data['detail'];

        $product->save();

        return $this->sendResponse(
            new PostResource($product),
            'Produk Berhasil di Update'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $product)
    {
        //
        $product->delete();

        return $this->sendResponse([], 'Produk Berhasil di Hapus');
    }
}
