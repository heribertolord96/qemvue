<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',100)->unique();
            $table->string('slug', 128)->unique();
            $table->string('codigo', 50)->nullable()->unique();
            $table->string('descripcion',100);
            $table->integer('stock')->nullable();            
            $table->string('file',100)->nullable();
            $table->string('presentacion',100)->nullable();
            $table->string('precio_venta',100)->nullable();
            

            $table->unsignedBigInteger('category_id')->nullable();
            
      $table->boolean('condition')->default(1);
      $table->timestamps();
            $table->foreign('category_id')
      ->references('id')->on('categories')
      ->onDelete('restrict')->onUpdate('restrict');

    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
