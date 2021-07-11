<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            (isBase('transactions')) ? $table->id() : $table->unsignedBigInteger('id')->index()->unique();
            $table->string('terminal_website')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('withdraw_payment_id')->index()->nullable();
            $table->string('product_product_no')->index()->nullable();
            $table->string('amount');
            $table->string('wage');
            $table->string('type')->nullable();
            $table->string('mobile')->nullable();
            $table->string('national_code')->nullable();
            $table->string('callback_url');
            $table->string('card_no')->nullable();
            $table->longText('description')->nullable();
            $table->longText('note')->nullable();
            $table->string('order_id')->nullable();
            $table->string('request_id')->unique();
            $table->string('reference_no')->nullable();
            $table->string('trace_no')->nullable();
            $table->string('psp_token')->nullable();
            $table->string('token')->unique();
            $table->string('psp_name')->nullable();
            $table->boolean('wage_payer')->default(0);
            $table->string('response_code')->nullable();
            $table->integer('status')->nullable();
            $table->string('card_no_hash')->nullable();
            $table->string('card_no_mask')->nullable();
            $table->string('merchant_ip');
            $table->string('customer_ip')->nullable();
            $table->string('discount_code')->nullable();
            $table->timestamp('initiated_at')->nullable();
            $table->timestamp('expired_at')->nullable();
            $table->timestamp('used_at')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('customer_mobile')->nullable();
            $table->longText('customer_note')->nullable();
            $table->timestamps();
            $table->softDeletes();

            if(checkRelation('terminals')) {
                $table->foreign('terminal_website')
                    ->references('website')
                    ->on('terminals')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            }

            if(checkRelation('users')) {
                $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
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
        Schema::dropIfExists('transactions');
    }
}
