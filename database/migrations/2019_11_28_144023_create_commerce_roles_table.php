<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommerceRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commerce_roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('commerce_id')->index();
            $table->unsignedBigInteger('role_id')->index();
           
            $table->timestamps();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('commerce_id')->references('id')->on('commerces')->onDelete('cascade');
        
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commerce_roles');
    }
}
