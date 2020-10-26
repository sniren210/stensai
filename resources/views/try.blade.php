<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Try Model</title>
</head>
<body>
  <h1 align='center'>Try Models</h1>
  <br>
  <a href="/try/export">Export</a>
  <br>
  <br>
  <form action="/try/import" enctype="multipart/form-data" method="POST">
    @csrf
    <input type="file" name="file">
    <button type="submit">Import</button>
  </form>
  <br>
  <a href="/try/pdf">Pdf</a>
  <hr>

  <h3>Siswa</h3>
  <table border="1">
    <tr>
      <th align="left">Nama</th>
      <th align="left">Jurusan</th>
      <th align="left">Kelas</th>
    </tr>
    @foreach ($siswa as $data)
    <tr>
      <td>{{$data->nama}} </td>
      <td>{{$data->kelas->jurusan->nama}} </td>
      <td>{{$data->kelas->kelas}} </td>
    </tr>
    @endforeach
  </table>

  <h3>Ajuan</h3>
  <table border="1">
    <tr>
      <th align="left">Judul</th>
      <th align="left">kategori</th>
    </tr>
    @foreach ($ajuan as $data)
    <tr>
      <td>{{$data->judul}} </td>
      <td>{{$data->kategori_post->kategori}} </td>
    </tr>
    @endforeach
  </table>

  <h3>Event</h3>
  <table border="1">
    <tr>
      <th align="left">nama</th>
    </tr>
    @foreach ($event as $data)
    <tr>
      <td>{{$data->nama}} </td>
    </tr>
    @endforeach
  </table>

  <h3>Guru</h3>
  <table border="1">
    <tr>
      <th align="left">nama</th>
      <th align="left">jadwal guru</th>
      <th align="left">Jam ke</th>
    </tr>
    @foreach ($jadwal_guru as $data)
    <tr>
      <td>{{$data->guru->nama}} </td>
      <td>{{$data->mapel->nama}} </td>
      <td>{{$data->jam_ke}} </td>
    </tr>
    @endforeach
  </table>
  
  <h3>Jadwal Kelas</h3>
  <table border="1">
    <tr>
      <th align="left">kelas</th>
      <th align="left">jadwal kelas</th>
      <th align="left">Jam ke</th>
    </tr>
    @foreach ($jadwal_kelas as $data)
    <tr>
      <td>{{$data->kelas->kelas}} {{$data->kelas->sub_kelas}} </td>
      <td>{{$data->mapel->nama}} </td>
      <td>{{$data->jam_ke}} </td>
    </tr>
    @endforeach
  </table>
  
  <h3>Ruang</h3>
  <table border="1">
    <tr>
      <th align="left">Ruang</th>
      <th align="left">jadwal ruang</th>
      <th align="left">Jam ke</th>
    </tr>
    @foreach ($jadwal_ruang as $data)
    <tr>
      <td>{{$data->ruang->nmr_ruang}} {{$data->ruang->jenis_ruang}} </td>
      <td>{{$data->mapel->nama}} </td>
      <td>{{$data->jam_ke}} </td>
    </tr>
    @endforeach
  </table>
  
  {{-- {{dd($nilai_siswa)}} --}}
  <h3>Nilai Siswa</h3>
  <table border="1">
    <tr>
      <th align="left">Nama</th>
      <th align="left">Mapel</th>
      <th align="left">Nilai</th>
    </tr>
    @foreach ($nilai_siswa as $data)
    <tr>
      <td>{{$data->siswa->nama}} </td>
      <td>{{$data->mapel->nama}} </td>
      <td>{{$data->nilai}} </td>
    </tr>
    @endforeach
  </table>
  
  
  <h3>Saran</h3>
  <table border="1">
    <tr>
      <th align="left">nama siswa</th>
      <th align="left">nama event</th>
      <th align="left">saran</th>
    </tr>
    @foreach ($saran as $data)
    <tr>
      <td>{{$data->siswa->nama}} </td>
      <td>{{$data->event->nama}} </td>
      <td>{{$data->deskripsi}} </td>
    </tr>
    @endforeach
  </table>

  <h3>Jadwal Guru</h3>
  <table border="1">
    <tr>
      <th align="left">nama guru</th>
      <th align="left">Jadwal</th>
      <th align="left">Jam Ke</th>
    </tr>
    @foreach ($jadwal_guru as $data)
    <tr>
      <td>{{$data->guru->nama}} </td>
      <td>{{$data->mapel->nama}} </td>
      <td>{{$data->jam_ke}} </td>
    </tr>
    @endforeach
  </table>

  
  <h3>Kelas</h3>
  <table border="1">
    <tr>
      <th align="left">Kelas</th>
      <th align="left">Sub Kelas</th>
    </tr>
    @foreach ($kelas as $data)
    {{-- {{dd($data->jurusan)}} --}}
    <tr>
      {{-- {{dd($data->jurusan->nama)}} --}}
      <td>{{$data->kelas}} </td>
      <td>{{$data->sub_kelas}} </td>
      <td>{{$data->jurusan->nama}} </td>
    </tr>
    @endforeach
  </table>

</body>
</html>