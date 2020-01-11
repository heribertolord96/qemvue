<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('calle',100);
            $table->string('numero_interior',100)->nullable();
            $table->string('numero_exterior',100)->nullable();
            $table->string('municipio',100)->nullable();
            $table->string('estado',100)->nullable();
            $table->string('pais',100)->nullable();

            $table->string('latitud',100)->nullable();
            $table->string('longitud',100)->nullable();
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
        Schema::dropIfExists('locations');
    }
}
