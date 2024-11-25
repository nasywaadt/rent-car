<?php

namespace App\Livewire;

use App\Models\transaksi;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class LihatTransaksi extends Component
{
    use WithPagination, WithoutUrlPagination;

    #[On('lihat-transaksi')]
    public function render()
    {
        if (Auth::user()->role === 'admin') {
            $data['transaksi'] = transaksi::paginate(10);
        } else {
            // Jika pengguna bukan admin, hanya tampilkan transaksi yang terkait dengan mobil yang dimiliki oleh pengguna yang sedang login
            $data['transaksi'] = transaksi::whereHas('mobil', function ($query) {
                $query->where('user_id', Auth::id()); // Filter mobil berdasarkan user_id
            })->paginate(10);
        }

        return view('livewire.lihat-transaksi', $data);
    }
    public function proses($id){
        $transaksi=transaksi::find($id);
        $transaksi->update([
            'status' => 'Process'
        ]);
        session()->flash('success', 'Successfully process data');
    }
    public function selesai($id){
        $transaksi=transaksi::find($id);
        $transaksi->update([
            'status' => 'Finish'
        ]);
        session()->flash('success', 'Successfully process data');
    }
}
