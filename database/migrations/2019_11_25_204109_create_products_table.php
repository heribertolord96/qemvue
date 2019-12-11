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
            $table->string('name',100);
            $table->string('slug', 128)->unique();
            $table->string('codigo', 50)->nullable();
            $table->string('descripcion',100);
            $table->integer('stock')->nullable();
            
            $table->string('file',100)->nullable();
            $table->string('presentacion',100)->nullable();
            $table->string('precio_venta',100)->nullable();
            

            $table->unsignedBigInteger('category_id')->nullable();
            //$table->unsignedBigInteger('department_id')->nullable();
            //$table->unsignedBigInteger('commerce_id')->nullable();

            /*$table->foreign('commerce_id')
                ->references('id')->on('commerces')
                 ->onDelete('restrict')->onUpdate('restrict');
                    $table->foreign('department_id')
                    ->references('id')->on('departments')
                    ->onDelete('restrict')->onUpdate('restrict');
                    $table->boolean('condicion')->default(1);
                    
                    $table->charset='utf8mb4';
                    $table->collation='utf8mb4_spanish_ci';
      */
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
