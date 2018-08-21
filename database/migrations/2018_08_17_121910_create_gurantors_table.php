<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGurantorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gurantors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('loan_id')->unsigned();
            $table->foreign('loan_id')
                    ->references('id')
                    ->on('loan_applications')
                    ->onDelete('cascade');
            $table->bigInteger('mem_no')->unsigned();
            $table->foreign('mem_no')
                    ->references('id')
                    ->on('masterfiles')
                    ->onDelete('cascade');
            $table->double('amount');
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
        Schema::dropIfExists('gurantors');
    }
}
