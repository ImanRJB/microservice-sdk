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
            (isBase('products')) ? $table->id() : $table->unsignedBigInteger('id')->index()->unique();
            $table->string('terminal_website')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('title');
            $table->string('product_no')->index()->unique();
            $table->string('amount');
            $table->longText('description')->nullable();
            $table->boolean('name')->default(0);
            $table->boolean('name_required')->default(0);
            $table->boolean('email')->default(0);
            $table->boolean('email_required')->default(0);
            $table->boolean('mobile')->default(0);
            $table->boolean('mobile_required')->default(0);
            $table->boolean('note')->default(0);
            $table->boolean('note_required')->default(0);
            $table->boolean('discount_code')->default(0);
            $table->integer('order_limit')->default(-1);
            $table->boolean('factor')->default(0);
            $table->boolean('status')->default(1)->nullable();
            $table->string('success_callback_url')->nullable();
            $table->string('failure_callback_url')->nullable();
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
        Schema::dropIfExists('products');
    }
}
