<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('biodata_1180', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 150);
            $table->string('nim', 30);
            $table->string('kelas', 50);
            $table->string('email', 150)->nullable();
            $table->string('no_hp', 30)->nullable();
            $table->string('alamat')->nullable();
            $table->text('tentang_saya')->nullable();
            $table->text('pendidikan')->nullable();
            $table->text('pengalaman')->nullable();
            $table->text('keahlian')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Biodata.php');
    }
};
