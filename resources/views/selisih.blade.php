<h1>Tanpa Basa Basi, inilah dia Selisihnya.</h1>
<ul>
    <table>
    @foreach($data as $no => $data)
        <tr>
            <td>{{$no+1}}. <b>{{ $data->nip }}</b> - {{ $data->nama }}</td><td>:</td><td>{{ $data->catatan }}</td>
        </tr>
    @endforeach
    </table>
</ul>
