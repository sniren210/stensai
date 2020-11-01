<?php

namespace App\Http\Controllers;

use App\event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EventController extends Controller
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
        'nama' => ['required', 'string', 'max:255'],
        'deskripsi' => ['required', 'string', 'min:8'],
        'foto' => 'required|file|image|mimes:jpeg,png,jpg',
    ];

    public function index()
    {
        $data = [
            'event' => event::all(),
        ];

        return view('peran.event.table', $data);
    }

    public function home()
    {
        $data = [
            'event' => event::all(),
        ];

        return view('peran.event.home', $data);
    }

    public function selengkapnya(event $event)
    {
        $data = [
            'event' => $event,
        ];

        return view('peran.event.selengkapnya', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('peran.event.tambah');
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

        $request->foto->originalName =
            time() . '_' . $request->foto->getClientOriginalName();

        $request->foto->move('img/event', $request->foto->originalName);

        event::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'foto' => $request->foto->originalName,
            'tanggal' => date('Y-m-d'),
        ]);
        return redirect('event')->with('status', 'Event berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(event $event)
    {
        $data = [
            'event' => $event,
        ];

        return view('peran.event.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(event $event)
    {
        $data = [
            'event' => $event,
        ];

        return view('peran.event.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, event $event)
    {
        $request->validate(
            [
                'nama' => ['required', 'string', 'max:255'],
                'deskripsi' => ['required', 'string', 'min:8'],
                'foto' => 'file|image|mimes:jpeg,png,jpg',
            ],
            $this->messages
        );

        if ($request->foto) {
            if ($request->foto->originalName == 'event-default.png') {
                $request->foto->originalName =
                    time() . '_' . $request->foto->getClientOriginalName();
            } else {
                $request->foto->originalName =
                    time() . '_' . $request->foto->getClientOriginalName();
                File::delete('img/event/' . $event->foto);
            }

            $request->foto->move('img', $request->foto->originalName);

            event::where('id', $event->id)->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'foto' => $request->foto->originalName,
                'tanggal' => date('Y-m-d'),
            ]);

            return redirect('event')->with(
                'status',
                'Akun Guru berhasil diubah.'
            );
        }

        event::where('id', $event->id)->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'foto' => $event->foto,
            'tanggal' => date('Y-m-d'),
        ]);

        return redirect('/event')->with('status', 'akun guru berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(event $event)
    {
        if ($event->foto != 'event-default.png') {
            File::delete('img/event/' . $event->foto);
        }

        event::destroy($event->id);
        return redirect('event')->with('status', 'Event berhasil dihapus.');
    }
}
