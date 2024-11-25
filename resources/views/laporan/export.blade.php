<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <h1>Transaction Report</h1>
    <table class="table">
        <thead> 
            <tr>
                <th scope="col">No</th>
                <th scope="col">Police Number</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
                <th>Duration</th>
                <th>Date</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transaksi as $data)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $data->mobil->nopolisi}}</td>
                    <td>{{ $data->nama}}</td>
                    <td>{{ $data->alamat}}</td>
                    <td>{{ $data->ponsel}}</td>
                    <td>{{ $data->lama}}</td>
                    <td>{{ $data->tgl_pesan}}</td>
                    <td>@rupiah($data->total)</td>
                </tr>  
            @empty
                <tr>
                    <td colspan="8"> Transaction report data is not available</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>