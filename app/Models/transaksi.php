<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class transaksi extends Model
{
    use HasFactory;

    protected $table='transaksis';
    protected $primaryKey='id';
    protected $fillable=['id','user_id', 'mobil_id', 'nama', 'ponsel', 'alamat', 'lama', 'tgl_pesan', 'total', 'status'];

    public function user():BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function mobil():BelongsTo {
        return $this->belongsTo(Mobil::class, 'mobil_id');
    }  
}
