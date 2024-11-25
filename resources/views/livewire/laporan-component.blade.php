<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                @if (session()->has('success'))
                 <div class="alert alert-success" role="alert">
                    {{ session('success')}}
                  </div>  
                @endif
                <h6 class="mb-4">Transaction Report </h6>
                  <div class="row">
                    <div class="col-md-4">
                        <input type="date" wire:model="tanggal1" class="form-control">
                    </div>
                    <div class="col-md-1">
                        s/d
                    </div>
                    <div class="col-md-4">
                        <input type="date" wire:model="tanggal2" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-sm btn-primary" wire:click="cari">Search</button>
                    </div>
                  </div>
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
                {{$transaksi->links() }}
                <button class="btn btn-primary" wire:click="exportpdf">Export PDF</button>
            </div>
        </div>
    </div>
</div>

   

