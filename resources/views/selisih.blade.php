<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Selisih Master Data</title>
    <style>
        .centerdiv {
            max-width: fit-content;
            margin-left: auto;
            margin-right: auto;
        }
        .tableFixHead          { overflow: auto; height: 100px; }
        .tableFixHead thead th { position: sticky; top: 0; z-index: 1; }
        /* table  { border-collapse: collapse; width: 100%; }
        th, td { padding: 8px 16px; }
        th     { background:#eee; } */
    </style>
</head>
<body>
    <div class="centerdiv">
        <div>
            <h1>Tanpa Basa Basi, inilah dia Selisihnya.</h1>
            <table>
            @foreach($data as $no => $data)
                <tr>
                    <td>{{$no+1}}. <b>{{ $data->nip }}</b> - {{ $data->nama }}</td><td>:</td><td>{{ $data->catatan }}</td>
                </tr>
            @endforeach
            </table>
        </div>
        <img src="/cat2.png" />
    </div>
</body>
</html>


