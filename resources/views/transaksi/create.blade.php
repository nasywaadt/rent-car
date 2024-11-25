<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Add Transaction</h6>
                <form>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Customer Name</label>
                        <input type="text" class="form-control" wire:model="nama" id="nama" value="{{ @old('nama')}}">
                        @error('nama')
                        <div class="form-text text-danger"> {{ $message }}</div>
                        @enderror    
                    </div>
                    <div class="mb-3">
                        <label for="ponsel" class="form-label"> Customer Phone </label>
                        <input type="text" class="form-control" wire:model="ponsel" id="ponsel" value="{{ @old('ponsel')}}">
                        @error('ponsel')
                        <div class="form-text text-danger"> {{ $message }}</div>
                        @enderror  
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Customer Address</label>
                        <input type="text" class="form-control" wire:model="alamat" id="alamat" value="{{ @old('alamat')}}">
                        @error('alamat')
                        <div class="form-text text-danger"> {{ $message }}</div>
                        @enderror  
                    </div>
                    <div class="mb-3">
                        <label for="lama" class="form-label">Rental Duration</label>
                        <input type="number" class="form-control" wire:change="hitung" wire:model="lama" id="lama" value="{{ @old('lama')}}">
                        @error('lama')
                        <div class="form-text text-danger"> {{ $message }}</div>
                        @enderror  
                    </div>
                    <div class="mb-3">
                        <label for="tglpesan" class="form-label">Date of Rental</label>
                        <input type="date" class="form-control" wire:model="tglpesan" id="tglpesan" value="{{ @old('tglpesan')}}">
                        @error('tglpesan')
                        <div class="form-text text-danger"> {{ $message }}</div>
                        @enderror  
                    </div>
                    <div class="mb-3">
                        Total : {{$total}}
                    </div>
                    <button type="button" wire:click="store" class="btn btn-primary">Rent</button>
                </form>
            </div>
        </div>
    </div>
</div>


