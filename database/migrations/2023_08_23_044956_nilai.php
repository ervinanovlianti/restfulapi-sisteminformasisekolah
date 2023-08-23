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
        Schema::create('nilai', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id');
            $table->string('mata_pelajaran');
            $table->integer('nilai_ls1');
            $table->integer('nilai_ls2');
            $table->integer('nilai_ls3');
            $table->integer('nilai_ls4');
            $table->integer('nilai_uh1');
            $table->integer('nilai_uh2');
            $table->integer('nilai_uts');
            $table->integer('nilai_uas');
        });
    }

    public function down()
    {
        //
    }
};
