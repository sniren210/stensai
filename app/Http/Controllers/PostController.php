<?php

namespace App\Http\Controllers;

use App\kategori_post;
use App\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    protected $messages = [
        'required' => 'Form harus di isi',
        'email' => 'Harus di isi email',
        'image' => 'file harus gambar',
        'mimes' => 'file harus jpeg,jpg,png',
        'file' => 'harus input file',
        'confirmed' => 'password tidak cocok',
        'unique' => 'sudah ada',
    ];
    protected $validasi = [
        'judul' => ['required', 'string', 'max:255'],
        'kategori' => ['required', 'string', 'max:255'],
        'deskripsi' => ['required', 'string', 'min:8'],
        'thumbnail' => 'required|file|image|mimes:jpeg,png,jpg',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'post' => post::all(),
        ];
        //
        return view('mading.table', $data);
    }

    public function home($id = null)
    {
        if ($id) {
            if ($id == 1) {
                $data = [
                    'post' => post::where('kategori_id', $id)->get(),
                    'mading' => 'karya',
                ];
            } else {
                $data = [
                    'post' => post::where('kategori_id', $id)->get(),
                    'mading' => 'eskul',
                ];
            }
        } else {
            $data = [
                'mading' => 'home',
                'post' => post::all(),
            ];
        }

        return view('mading.home', $data);
    }

    public function selengkapnya(post $post)
    {
        $data = [
            'post' => $post,
        ];

        return view('mading.selengkapnya', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'kategori' => kategori_post::all(),
        ];
        //
        return view('mading.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validasi, $this->messages);

        $request->thumbnail->originalName =
            time() . '_' . $request->thumbnail->getClientOriginalName();

        $request->thumbnail->move(
            'img/thumbnail',
            $request->thumbnail->originalName
        );

        post::create([
            'nama' => null,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'thumbnail' => $request->thumbnail->originalName,
            'kategori_id' => $request->kategori,
            'tanggal' => date('Y-m-d'),
            'user_id' => Auth::user()->id,
        ]);
        return redirect('mading')->with(
            'status',
            'Mading berhasil ditambahkan.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = [
            'post' => post::find($id),
        ];

        return view('mading.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'post' => post::find($id),
            'kategori' => kategori_post::all(),
        ];
        //
        return view('mading.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $post)
    {
        $data = post::find($post);

        $request->validate(
            [
                'judul' => ['required', 'string', 'max:255'],
                'kategori' => ['required', 'string', 'max:255'],
                'deskripsi' => ['required', 'string', 'min:8'],
                'thumbnail' => 'file|image|mimes:jpeg,png,jpg',
            ],
            $this->messages
        );

        if ($request->thumbnail) {
            if ($request->thumbnail->originalName = 'thumbnail-default.png') {
                $request->thumbnail->originalName =
                    time() . '_' . $request->thumbnail->getClientOriginalName();
            } else {
                $request->thumbnail->originalName =
                    time() . '_' . $request->thumbnail->getClientOriginalName();
                File::delete('img/thumbnail/' . $data->thumbnail);
            }

            $request->thumbnail->move(
                'img/thumbnail',
                $request->thumbnail->originalName
            );

            post::where('id', $data->id)->update([
                'nama' => $data->nama,
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'thumbnail' => $request->thumbnail->originalName,
                'kategori_id' => $request->kategori,
                'tanggal' => date('Y-m-d'),
                'user_id' => Auth::user()->id,
            ]);

            return redirect('mading')->with(
                'status',
                'Mading berhasil diubah.'
            );
        }

        post::where('id', $data->id)->update([
            'nama' => $data->nama,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'thumbnail' => $data->thumbnail,
            'kategori_id' => $request->kategori,
            'tanggal' => date('Y-m-d'),
            'user_id' => Auth::user()->id,
        ]);
        return redirect('mading')->with('status', 'Mading berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($post)
    {
        $data = post::find($post);

        if ($data->thumbnail->originalName != 'thumbnail-default.png') {
            File::delete('img/thumbnail/' . $data->thumbnail);
        }

        post::destroy($post);
        return redirect('mading')->with('status', 'Mading berhasil dihapus.');
    }
}
