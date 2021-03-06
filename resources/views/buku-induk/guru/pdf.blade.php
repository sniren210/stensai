<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Guru SMKN 1 Majalengka</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  </head>
  <body>
    <div class="row">
      <div class="col-6">
        <h3>Data Guru SMKN 1 Majalengka</h3>
      </div>
    </div>
    <table class="table table-bordered" border="1">
    <thead>
      <tr class="table-danger">
        <td>Nama</td>
        <td>NIP</td>
        <td>NPWP</td>
        <td>Jenis kelamin</td>
        <td>TTL</td>
        <td>Alamat</td>
      </tr>
      </thead>
      <tbody>
        @foreach ($guru as $data)
        <tr>
            <td>{{ $data->nama }}</td>
            <td>{{ $data->nis }}</td>
            <td>{{ $data->nisn }}</td>
            <td>{{ $data->jk }}</td>
            <td>{{ $data->tmp_lahir }} {{ $data->tgl_lahir }}</td>
            <td>{{ $data->alamat }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </body>
</html>