<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                @if (session()->has('success'))
                 <div class="alert alert-success" role="alert">
                    {{ session('success')}}
                  </div>  
                @endif
                <h6 class="mb-4">Customer Transaction</h6>
                <table class="table">
                    <thead> 
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Police Number</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Address</th>
                            <th scope="col">Duration</th>
                            <th scope="col">Date</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status</th>
                            <th scope="col">Process</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transaksi as $data)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $data->mobil->nopolisi}}</td>
                                <td>{{ $data->mobil->merk}}</td>
                                <td>{{ $data->nama}}</td>
                                <td>{{ $data->ponsel}}</td>
                                <td>{{ $data->alamat}}</td>
                                <td>{{ $data->lama}}</td>
                                <td>{{ $data->tgl_pesan}}</td>
                                <td>@rupiah($data->total)</td>
                                <td>{{ $data->status}}</td>
                                <td>
                                    @if ($data->status == 'Wait')
                                        <button class="btn btn-sm btn-success" wire:click='proses({{$data->id}})'>Process</button>
                                    @endif 
                                    @if ($data->status == 'Process')
                                        <button class="btn btn-sm btn-success" wire:click='selesai({{$data->id}})'>Finish</button>
                                    @endif 
                                </td>
                            </tr>  
                        @empty
                            <tr>
                                <td colspan="11"> Customer transaction is not available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{$transaksi->links() }}
            </div>
        </div>
    </div>
</div>

   

