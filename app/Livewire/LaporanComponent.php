<?php

namespace App\Livewire;

use App\Models\transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class LaporanComponent extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $tanggal1, $tanggal2;

    #[On('lihat-laporan')]
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

        if ($this->tanggal2 != ""){
            if (Auth::user()->role === 'admin') {
                $data['transaksi'] = transaksi::where('status', 'Finish')
                ->whereBetween('tgl_pesan', [$this->tanggal1, $this->tanggal2])
                ->paginate(10);
            } else {
                // Jika pengguna bukan admin, hanya tampilkan transaksi yang terkait dengan mobil yang dimiliki oleh pengguna yang sedang login
                $data['transaksi']=transaksi::whereHas('mobil', function ($query) {
                    $query->where('user_id', Auth::id()); // Menyaring mobil yang dimiliki oleh pengguna yang sedang login
                })
                ->where('status', 'Finish')
                ->whereBetween('tgl_pesan', [$this->tanggal1, $this->tanggal2])
                ->paginate(10);
            }
           
        } else {
            if (Auth::user()->role === 'admin') {
                $data['transaksi'] = transaksi::paginate(10);
            } else {
                // Jika pengguna bukan admin, hanya tampilkan transaksi yang terkait dengan mobil yang dimiliki oleh pengguna yang sedang login
                $data['transaksi'] = transaksi::whereHas('mobil', function ($query) {
                    $query->where('user_id', Auth::id()); // Filter mobil berdasarkan user_id
                })->paginate(10);
            }
        }
       
        return view('livewire.laporan-component', $data);
    }

    public function cari(){
       $this->dispatch('lihat-laporan');
    }

    public function exportpdf(){

        if ($this->tanggal2 != ""){
            $data['transaksi']=transaksi::whereHas('mobil', function ($query) {
                $query->where('user_id', Auth::id()); // Menyaring mobil yang dimiliki oleh pengguna yang sedang login
            })
                ->where('status', 'Finish')
                ->whereBetween('tgl_pesan', [$this->tanggal1, $this->tanggal2])
                ->paginate();
            $pdf = Pdf::loadView('laporan.export', $data)->output();
            return response()->streamDownload(
               fn () => print($pdf),
                "Transaction report (".$this->tanggal1.") - (".$this->tanggal2.").pdf"
            );
        } else {
            $data['transaksi']=transaksi::whereHas('mobil', function ($query) {
                $query->where('user_id', Auth::id()); // Menyaring mobil yang dimiliki oleh pengguna yang sedang login
            })
            ->where('status', 'Finish')->get();
            $pdf = Pdf::loadView('laporan.export', $data)->output();
            return response()->streamDownload(
               fn () => print($pdf),
                "Transaction report.pdf"
            );
        } 
    }
}
