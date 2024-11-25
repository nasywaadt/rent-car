<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class mobil extends Model
{
    use HasFactory;

    protected $table='mobils';
    protected $primaryKey='id';
    protected $fillable=['id', 'user_id', 'nopolisi', 'merk', 'jenis', 'kapasitas', 'harga', 'foto'];

    public function user():BelongsTo {
        return $this->belongsTo(User::class);
    }
}
