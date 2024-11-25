<?php

namespace App\Livewire;

use App\Models\mobil;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class MobilComponent extends Component
{
    use WithPagination, WithoutUrlPagination, WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $addPage, $editPage = false;
    public $nopolisi, $merk, $jenis, $kapasitas, $harga, $foto, $id;


    public function render()
    {
        // Ambil data mobil yang hanya dimiliki oleh pengguna yang sedang login
        if (Auth::user()->role === 'admin') {
            // Jika admin, tampilkan semua mobil
            $mobil = Mobil::paginate(10);
        } else {
            // Jika pengguna bukan admin (pemilik), tampilkan hanya mobil miliknya
            $mobil = Mobil::where('user_id', Auth::id())->paginate(10);
        }

        return view('livewire.mobil-component', [
            'mobil' => $mobil
        ]);
    }
    public function create(){
        $this->addPage = true;
    }
    public function store(){
        $this->validate([
            'nopolisi' => 'required',
            'merk' => 'required',
            'jenis' => 'required',
            'harga' => 'required',
            'kapasitas' => 'required',
            'foto' => 'required|image',
        ],[
            'nopolisi.required' => 'The police number field is required',
            'merk.required' => 'The brand field is required',
            'jenis.required' => 'The type field is required',
            'harga.required' => 'The price field is required',
            'kapasitas.required' => 'The capacity field is required',
            'foto.required' => 'The photo field is required',
            'foto.image' => 'The photo field must be an image',
        ]);

        $this->foto->storeAs('public/mobil', $this->foto->hashName());
        Mobil::create([
            'user_id'=> auth()->user()->id,
            'nopolisi' => $this->nopolisi,
            'merk' => $this->merk,
            'jenis' => $this->jenis,
            'harga' => $this->harga,
            'kapasitas' => $this->kapasitas,
            'foto' => $this->foto->hashName(),
        ]);
        session()->flash('success', 'Data has been added');
        $this->reset();
    }
    public function edit($id){
        
        $this->editPage = true;
        $this->id = $id;

        $mobil = Mobil::find($id);

        $this->nopolisi = $mobil->nopolisi;
        $this->merk = $mobil->merk;
        $this->jenis = $mobil->jenis;
        $this->harga = $mobil->harga;  
        $this->kapasitas = $mobil->kapasitas;
    }

    public function update(){
        $mobil = Mobil::find($this->id);

        if (empty($this->foto)){
            $mobil->update([
                'user_id'=> auth()->user()->id,
                'nopolisi' => $this->nopolisi,
                'merk' => $this->merk,
                'jenis' => $this->jenis,
                'harga' => $this->harga, 
                'kapasitas' => $this->kapasitas,
            ]);
        } else{
            unlink(public_path('storage/mobil/'.$mobil->foto));
            $this->foto->storeAs('public/mobil', $this->foto->hashName());
            $mobil->update([
                'user_id'=> auth()->user()->id,
                'nopolisi' => $this->nopolisi,
                'merk' => $this->merk,
                'jenis' => $this->jenis,
                'harga' => $this->harga, 
                'kapasitas' => $this->kapasitas,
                'foto' => $this->foto->hashName(),
            ]);
        }
        session()->flash('success', 'Data has been updated');
        $this->reset();
    }

    public function destroy($id){
        $mobil=Mobil::find($id);
        
        unlink(public_path('storage/mobil/'. $mobil->foto));
        $mobil->delete();
        session()->flash('success', 'Data has been deleted');
        $this->reset();
    }
    
}
