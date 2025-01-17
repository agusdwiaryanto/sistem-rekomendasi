<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWisataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wisata', function (Blueprint $table) {
            $table->id(); // ID primary key
            $table->string('nama'); // Nama wisata
            $table->string('jenis_wisata'); // Jenis wisata
            $table->text('fasilitas_wisata'); // Fasilitas wisata
            $table->decimal('latitude', 10, 7); // Latitude
            $table->decimal('longitude', 10, 7); // Longitude
            $table->timestamps(); // Created_at dan Updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wisata');
    }
}
