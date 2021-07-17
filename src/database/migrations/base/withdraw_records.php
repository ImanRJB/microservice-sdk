<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdraw_records', function (Blueprint $table) {
            (isBase('withdraw_records')) ? $table->id() : $table->unsignedBigInteger('id')->primary();
            $table->string('withdraw_payment_id')->index();

            $table->string('acceptor_code');
            $table->string('iin');
            $table->string('payment_facilitator_iban');
            $table->integer('settlement_amount');
            $table->integer('wage_amount');
            $table->string('settlement_iban');

            $table->string('reference_no')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('tracking_number')->nullable();
            $table->timestamp('cycle_date')->nullable();

            $table->integer('index')->nullable();
            $table->integer('status')->nullable();
            $table->string('error_status')->nullable();
            $table->string('error_message')->nullable();
            $table->string('error_field_name')->nullable();
            $table->string('error_field_value')->nullable();
            $table->string('file_name')->nullable();
            $table->timestamps();

            if(checkRelation('withdraws')) {
                $table->foreign('withdraw_payment_id')
                    ->references('payment_id')
                    ->on('withdraws')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('withdraw_records');
    }
}
