<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                @if (session()->has('success'))
                 <div class="alert alert-success" role="alert">
                    {{ session('success')}}
                  </div>  
                @endif
                <h6 class="mb-4">Cars</h6>
                <table class="table">
                    <thead> 
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Police Number</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Type</th>
                            <th scope="col">Price</th>
                            <th scope="col">Capacity</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Process</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($mobil as $data)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $data->nopolisi}}</td>
                                <td>{{ $data->merk}}</td>
                                <td>{{ $data->jenis}}</td>
                                <td>@rupiah($data->harga)</td>
                                <td>{{ $data->kapasitas}}</td>
                                <td>
                                    <img src="{{ asset('storage/mobil/'.$data->foto) }}" alt="{{$data->merk}}" style="width: 150px">
                                </td>
                                <td>
                                    <button class="btn btn-info" wire:click="edit({{ $data->id }})">Edit</button>
                                    <button class="btn btn-danger" wire:click="destroy({{ $data->id }})">Delete</button>
                                </td>
                            </tr>  
                        @empty
                            <tr>
                                <td colspan="6"> Car data is not available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{$mobil->links() }}
                <button wire:click="create" class="btn btn-primary">Add</button>
            </div>
        </div>
    </div>
    @if ($addPage)
        @include('mobil.create')
    @endif
    @if ($editPage)
        @include('mobil.edit')
    @endif
</div>

   

