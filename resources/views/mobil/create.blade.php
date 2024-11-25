<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Add Car</h6>
                <form>
                    <div class="mb-3">
                        <label for="nopolisi" class="form-label">Police Numbers</label>
                        <input type="text" class="form-control" wire:model="nopolisi" id="nopolisi" value="{{ @old('nopolisi')}}">
                        @error('nopolisi')
                        <div class="form-text text-danger"> {{ $message }}</div>
                        @enderror    
                    </div>
                    <div class="mb-3">
                        <label for="merk" class="form-label">Brand</label>
                        <input type="text" class="form-control" wire:model="merk" id="merk" value="{{ @old('merk')}}">
                        @error('merk')
                        <div class="form-text text-danger"> {{ $message }}</div>
                        @enderror  
                    </div>
                    <div class="mb-3">
                        <label for="jenis" class="form-label">Type</label>
                        <select name="" class="form-select" wire:model="jenis">
                            <option value="">--Choice--</option>
                            <option value="sedan">Sedan</option>
                            <option value="MPV">MPV</option>
                            <option value="SUV">SUV</option>
                        </select>
                        @error('jenis')
                        <div class="form-text text-danger"> {{ $message }}</div>
                        @enderror  
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Price</label>
                        <input type="text" class="form-control" wire:model="harga" id="harga" value="{{ @old('harga')}}">
                        @error('harga')
                        <div class="form-text text-danger"> {{ $message }}</div>
                        @enderror  
                    </div>
                    <div class="mb-3">
                        <label for="kapasitas" class="form-label">Capacity</label>
                        <input type="number" class="form-control" wire:model="kapasitas" id="kapasitas" value="{{ @old('kapasitas')}}">
                        @error('kapasitas')
                        <div class="form-text text-danger"> {{ $message }}</div>
                        @enderror  
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Photo</label>
                        <input type="file" class="form-control" wire:model="foto" id="foto" value="{{ @old('foto')}}">
                        @error('foto')
                        <div class="form-text text-danger"> {{ $message }}</div>
                        @enderror  
                    </div>
                    <button type="button" wire:click="store" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>


