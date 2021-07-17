<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            (isBase('discounts')) ? $table->id() : $table->unsignedBigInteger('id')->index()->unique();
            $table->string('product_product_no')->index()->nullable();
            $table->string('terminal_website')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('code');
            $table->string('percent');
            $table->timestamp('expires_in')->nullable();
            $table->boolean('status')->default(1);
            $table->integer('count_limit')->nullable();
            $table->integer('max_amount')->nullable();
            $table->integer('min_amount')->nullable();
            $table->softDeletes();
            $table->timestamps();

            if(checkRelation('products')) {
                $table->foreign('product_product_no')
                    ->references('product_no')
                    ->on('products')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            }

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
        Schema::dropIfExists('discounts');
    }
}
