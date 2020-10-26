<table>
  <thead>
  <tr>
      <th>Nama</th>
      <th>NIS</th>
      <th>NISN</th>
      <th>Alamat</th>
  </tr>
  </thead>
  <tbody>
  @foreach($siswa as $data)
      <tr>
          <td>{{ $data->nama }}</td>
          <td>{{ $data->nis }}</td>
          <td>{{ $data->nisn }}</td>
          <td>{{ $data->alamat }}</td>
      </tr>
  @endforeach
  </tbody>
</table>
