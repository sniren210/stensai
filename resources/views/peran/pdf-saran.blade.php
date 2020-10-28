<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengajuan PDF SMKN 1 Majalengka</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  </head>
  <body>
    <div class="row">
      <div class="col-6">
        <h3>Data Pengajuan SMKN 1 Majalengka</h3>
      </div>
    </div>
    <table class="table table-bordered" border="1">
    <thead>
      <tr class="table-danger">
        <td>Nama</td>
        <td>NIS</td>
        <td>saran</td>
        <td>Dekripsi</td>
      </tr>
      </thead>
      <tbody>
        @foreach ($saran as $data)
        <tr>
            <td>{{ $data->siswa->nama }}</td>
            <td>{{ $data->siswa->nis }}</td>
            <td>{{ $data->event->nama }}</td>
            <td>{{ $data->deskripsi }} </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </body>
</html>