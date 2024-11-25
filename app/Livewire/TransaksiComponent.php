<?php

namespace App\Livewire;

use App\Models\mobil;
use App\Models\transaksi;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class TransaksiComponent extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $addPage= false;
    public $mobil_id, $nama, $ponsel, $alamat, $lama, $tglpesan, $harga, $total;
    public function render()
    {

        if (Auth::user()->role === 'admin') {
            // Jika admin, tampilkan semua mobil
            $mobil = Mobil::paginate(10);
        } else {
            // Jika pengguna bukan admin (pemilik), tampilkan hanya mobil miliknya
            $mobil = Mobil::where('user_id', Auth::id())->paginate(10);
        }

        return view('livewire.transaksi-component', ['mobil' => $mobil]);
    }
    public function create($id,$harga){
        $this->mobil_id = $id;
        $this->harga = $harga;
        $this->addPage = true;
    }
    public function hitung(){
        $lama = $this->lama;
        $harga = $this->harga;
        $this->total = $this->lama * $this->harga;
    }
    public function store(){
        $this->validate([
            'nama' => 'required',
            'ponsel' => 'required',
            'alamat' => 'required',
            'lama' => 'required',
            'tglpesan' => 'required'
        ],[
            'nama.required' => 'The customer name field is required.',
            'ponsel.required' => 'The customer phone field is required.',
            'alamat.required' => 'The customer address field is required.',
            'lama.required' => 'The rental duration field is required.',
            'tglpesan.required' => 'The date of rental field is required.'
        ]);
        $cari=transaksi::where('mobil_id', $this->mobil_id)
        ->where('tgl_pesan', $this->tglpesan)
        ->where('status','<>','Finish')->count();
        if ($cari == 1) {
            session()->flash('error', 'Mobil has been rented');
        } else {
            transaksi::create([
                'user_id'=>auth()->user()->id,
                'mobil_id' => $this->mobil_id,
                'nama' => $this->nama,
                'ponsel' => $this->ponsel,
                'alamat' => $this->alamat,
                'lama' => $this->lama,
                'tgl_pesan' => $this->tglpesan,
                'total' => $this->total,
                'status' => 'WAIT'
            ]);
        session()->flash('success' , 'Transaction has been created successfully');
      }
      $this->dispatch('lihat-transaksi');
      $this->reset();
    }
    
}
