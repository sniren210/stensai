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

  <h3>Data Pengguna Guru</h3>
  <table border="1">
    <tr>
      <th align="left">Nama</th>
      <th align="left">Wali Kelas</th>
    </tr>
    <tr>
      <td>{{Auth::user()->nama}} </td>
      <td>{{Auth::user()->kelas->first()->kelas}} {{Auth::user()->kelas->first()->sub_kelas}}</td>
    </tr>
  </table>

  <h3>Siswa Pengguna Guru</h3>
  <table border="1">
    <tr>
      <th align="left">Nama</th>
      <th align="left">NIS</th>
    </tr>
    @foreach (Auth::user()->kelas->first()->siswa as $data)        
    <tr>
      <td>{{$data->nama}} </td>
      <td>{{$data->nis}} </td>
    </tr>
    @endforeach
  </table>

  <h3>Mapel Pengguna Guru</h3>
  <table border="1">
    <tr>
      <th align="left">Mapel</th>
      <th align="left">Jam ke</th>
    </tr>
    @foreach (Auth::user()->jadwal_guru as $data)        
    <tr>
      <td>{{$data->mapel->nama}} </td>
      <td>{{$data->jam_ke}} </td>
    </tr>
    @endforeach
  </table>

</body>
</html>