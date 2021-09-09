<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWawancarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wawancaras', function (Blueprint $table) {
            $table->id();
            $table->string('id_wawancara')->nullable();
            $table->string('pertanyaan1');
            $table->string('pertanyaan2');
            $table->string('pertanyaan3');
            $table->string('pertanyaan4');
            $table->string('pertanyaan5');
            $table->string('pertanyaan6');
            $table->string('pertanyaan7');
            $table->string('pertanyaan8');
            $table->string('pertanyaan9');
            $table->string('pertanyaan10');
            $table->string('pertanyaan11');
            $table->string('pertanyaan12');
            $table->string('pertanyaan13');
            $table->string('pertanyaan14');
            $table->string('pertanyaan15');
            $table->string('pertanyaan16');
            $table->string('pertanyaan17');
            $table->string('pertanyaan18');
            $table->string('pertanyaan19');
            $table->string('pertanyaan20');
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
        Schema::dropIfExists('wawancaras');
    }
}
