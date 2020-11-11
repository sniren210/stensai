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

  <h3>Data Pengguna Siswa</h3>
  <table border="1">
    <tr>
      <th align="left">Nama</th>
      <th align="left">Kelas</th>
      <th align="left">Jurusan</th>
    </tr>
    <tr>
      <td>{{Auth::user()->nama}}</td>
      <td>{{Auth::user()->kelas->kelas}} {{Auth::user()->kelas->sub_kelas}}</td>
      <td>{{Auth::user()->kelas->jurusan->nama}}</td>
    </tr>
  </table>

  <h3>Nilai Pengguna Siswa</h3>
  <table border="1">
    <tr>
      <th align="left">Nilai</th>
      <th align="left">Mapel</th>
    </tr>
    <tr>
      @foreach (Auth::user()->nilai_siswa as $dat)
          <td>{{$dat->nilai}} </td>
          <td>{{$dat->mapel->nama}} </td>
      @endforeach
    </tr>
  </table>

  <h3>Mapel Kelas Pengguna Siswa</h3>
  <table border="1">
    <tr>
      <th align="left">Kelas</th>
      <th align="left">Jam ke</th>
      <th align="left">Mapel</th>
    </tr>
    <tr>
      @foreach (Auth::user()->kelas->jadwal_kelas as $dat)
          <td>{{$dat->kelas->kelas}} </td>
          <td>{{$dat->jam_ke}} </td>
          <td>{{$dat->mapel->nama}} </td>
      @endforeach
    </tr>
  </table>

</body>
</html>