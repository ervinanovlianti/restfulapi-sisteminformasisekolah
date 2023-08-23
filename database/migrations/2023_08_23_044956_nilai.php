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
            $table->string('nilai_ls1');
            $table->string('nilai_ls2');
            $table->string('nilai_ls3');
            $table->string('nilai_ls4');
            $table->string('nilai_uh1');
            $table->string('nilai_uh2');
            $table->string('nilai_uts');
            $table->string('nilai_uas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
