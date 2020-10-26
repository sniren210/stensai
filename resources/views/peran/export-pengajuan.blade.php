<table>
  <thead>
  <tr>
      <th>No</th>
      <th>Siswa</th>
      <th>Pengajuan</th>
      <th>Deskripsi</th>
  </tr>
  </thead>
  <tbody>
  @foreach($pengajuan as $data)
      <tr>
          <td>{{$loop->iteration}} </td>
          <td>{{ $data->siswa->nama }}</td>
          <td>{{ $data->pengajuan }}</td>
          <td>{{ $data->deskripsi }}</td>
      </tr>
  @endforeach
  </tbody>
</table>
