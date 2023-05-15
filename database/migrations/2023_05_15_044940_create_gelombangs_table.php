<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gelombangs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_gelombang');
            $table->date('tgl_mulai');
            $table->date('tgl_akhir');
            $table->enum('status_gelombang', ['active', 'non-active']);
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gelombangs');
    }
};
