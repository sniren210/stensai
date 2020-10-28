<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nilai Siswa SMKN 1 Majalengka</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  </head>
  <body>
    <div class="row">
      <div class="col-6">
        <h3>Nilai Siswa SMKN 1 Majalengka</h3>
      </div>
    </div>
    <table class="table table-bordered" border="1">
    <thead>
      <tr class="table-danger">
        <td>Nama</td>
        <td>NIS</td>
        <td>Mata Pelajaran</td>
        <td>Nilai</td>
      </tr>
      </thead>
      <tbody>
        @foreach ($nilai_siswa as $data)
        <tr>
            <td>{{ $data->siswa->nama }}</td>
            <td>{{ $data->siswa->nis }}</td>
            <td>{{ $data->mapel->nama }}</td>
            <td>{{ $data->nilai }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </body>
</html>