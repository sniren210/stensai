<table>
  <thead>
  <tr>
      <th>Nama</th>
      <th>NIP</th>
      <th>NPWP</th>
      <th>Alamat</th>
      <th>TTL</th>
      <th>Jenis Kelamin</th>
      <th>Agama</th>
  </tr>
  </thead>
  <tbody>
  @foreach($guru as $data)
      <tr>
          <td>{{ $data->nama }}</td>
          <td>{{ $data->nip }}</td>
          <td>{{ $data->npwp }}</td>
          <td>{{ $data->alamat }}</td>
          <td>{{$data->tmp_lahir}}, {{$data->tgl_lahir}}</td>
          <td>{{$data->jk}} </td>
          <td>{{$data->agama}} </td>
      </tr>
  @endforeach
  </tbody>
</table>
