<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommerceRoleUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commerce_role_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('commerce_role_id')->index();
            $table->unsignedBigInteger('commerce_user_id')->index();
           
            $table->timestamps();
            $table->foreign('commerce_user_id')->references('id')->on('commerce_users')->onDelete('cascade');
            $table->foreign('commerce_role_id')->references('id')->on('commerce_roles')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commerce_role_users');
    }
}
