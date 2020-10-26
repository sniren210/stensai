<table>
  <thead>
  <tr>
      <th>Nama</th>
      <th>NIS</th>
      <th>NISN</th>
      <th>Alamat</th>
      <th>TTL</th>
      <th>Jenis Kelamin</th>
      <th>Agama</th>
      <th>Anak Ke</th>
      <th>Nama Ayah</th>
      <th>Nama Ibu</th>
  </tr>
  </thead>
  <tbody>
  @foreach($siswa as $data)
      <tr>
          <td>{{ $data->nama }}</td>
          <td>{{ $data->nis }}</td>
          <td>{{ $data->nisn }}</td>
          <td>{{ $data->alamat }}</td>
          <td>{{$data->tmp_lahir}}, {{$data->tgl_lahir}}</td>
          <td>{{$data->jk}} </td>
          <td>{{$data->agama}} </td>
          <td>{{$data->anak_ke}} </td>
          <td>{{$data->nama_ayah}} </td>
          <td>{{$data->nama_ibu}} </td>
      </tr>
  @endforeach
  </tbody>
</table>
