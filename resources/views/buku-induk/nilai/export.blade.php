<table>
  <thead>
  <tr>
      <th>Nama</th>
      <th>NIS</th>
      <th>Mata Pelajaran</th>
      <th>Nilai</th>
  </tr>
  </thead>
  <tbody>
  @foreach($nilai_siswa as $data)
      <tr>
          <td>{{ $data->siswa->nama }}</td>
          <td>{{ $data->siswa->nis }}</td>
          <td>{{ $data->mapel->nama }}</td>
          <td>{{ $data->nilai }}</td>
      </tr>
  @endforeach
  </tbody>
</table>
