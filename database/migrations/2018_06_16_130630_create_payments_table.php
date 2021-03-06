<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('payment_mode');
            $table->integer('service_id')->unsigned();
            $table->foreign('service_id')
                ->references('id')
                ->on('service_options')
                ->onDelete('cascade');
            $table->bigInteger('client_id')->index()->unsigned()->nullable();
            $table->foreign('client_id')
                ->references('id')
                ->on('masterfiles')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->string('ref_number')->nullable();
            $table->integer('bank_id')->nullable();
            $table->double('amount');
            $table->string('paybill')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('BillRefNumber')->nullable();
            $table->string('TransID')->nullable();
            $table->timestamp('TransTime')->nullable();
            $table->string('FirstName')->nullable();
            $table->string('middleName')->nullable();
            $table->string('LastName')->nullable();
            $table->dateTime('received_on')->nullable();
//            $table->integer('client_id')->nullable();
            $table->integer('created_by')->nullable();
            $table->boolean('status')->default(false);
            $table->string('transferred_from')->nullable();
            $table->string('transferred_to')->nullable();
            $table->string('transferred_by')->nullable();

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
        Schema::dropIfExists('payments');
    }
}
