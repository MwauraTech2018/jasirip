<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',150)->unique();
            $table->string('code',150)->unique()->nullable();
            $table->integer('access_level_id')->unsigned();
            $table->foreign('access_level_id')
                ->references('id')->on('access_levels')
                ->onUpdate('cascade')->onDelete('cascade');
//            $table->integer('client_id')->unsigned();
//            $table->foreign('client_id')->references('id')->on('clients')
//                ->onUpdate('cascade');
            $table->integer('created_by')->index()->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('roles');
    }
}
