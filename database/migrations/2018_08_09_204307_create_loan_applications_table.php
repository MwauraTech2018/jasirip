<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_applications', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('mem_no')->unsigned();
            $table->foreign('mem_no')
                    ->references('id')
                    ->on('masterfiles')
                    ->onDelete('cascade');
            $table->integer('loan_type_id')->unsigned();
            $table->foreign('loan_type_id')
                    ->references('id')
                    ->on('loan_types')
                    ->onDelete('cascade');
            $table->date('application_date');
            $table->double('applied_amt');
            $table->double('approved_amt')->nullable();
            $table->date('approval_date');
            $table->double('repayment_prd');
            $table->double('balance_todate')->nullable();
            $table->integer('created_by');
            $table->integer('approved_by')->nullable();
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('loan_applications');
    }
}
