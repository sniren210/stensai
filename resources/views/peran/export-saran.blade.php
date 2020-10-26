<table>
  <thead>
  <tr>
      <th>No</th>
      <th>Siswa</th>
      <th>Event</th>
      <th>Saran</th>
  </tr>
  </thead>
  <tbody>
  @foreach($saran as $data)
      <tr>
          <td>{{$loop->iteration}} </td>
          <td>{{ $data->siswa->nama }}</td>
          <td>{{ $data->event->nama }}</td>
          <td>{{ $data->deskripsi }}</td>
      </tr>
  @endforeach
  </tbody>
</table>
