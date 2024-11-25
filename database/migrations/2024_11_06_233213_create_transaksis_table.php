<?php

use App\Models\mobil;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(mobil::class);
            $table->string('nama')->nullable();
            $table->string('ponsel')->nullable();
            $table->string('alamat')->nullable();
            $table->string('lama')->nullable();
            $table->date('tgl_pesan')->nullable();
            $table->string('total')->nullable();
            $table->enum('status', ['Wait', 'Process', 'Finish'])->nullable();
            $table->timestamps();
            $table->softDeletes('delete_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
