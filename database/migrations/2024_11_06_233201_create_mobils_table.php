<?php

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
        Schema::create('mobils', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string('nopolisi')->nullable();
            $table->string('merk')->nullable();
            $table->enum('jenis', ['sedan', 'MPV', 'SUV'])->nullable();
            $table->string('kapasitas')->nullable();
            $table->string('harga')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
            $table->softDeletes('delate_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobils');
    }
};
