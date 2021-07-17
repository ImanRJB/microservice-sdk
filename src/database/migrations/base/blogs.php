<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            (isBase('blogs')) ? $table->id() : $table->unsignedBigInteger('id')->index()->unique();
            $table->unsignedBigInteger('admin_id')->index();
            $table->unsignedBigInteger('blog_category_id')->index();
            $table->string('photo');
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('body');
            $table->json('tags');
            $table->softDeletes();
            $table->timestamps();

            if(checkRelation('admins')) {
                $table->foreign('admin_id')
                    ->references('id')
                    ->on('admins')
                    ->onDelete('set null')
                    ->onUpdate('cascade');
            }

            if(checkRelation('blog_categories')) {
                $table->foreign('blog_category_id')
                    ->references('id')
                    ->on('blog_categories')
                    ->onDelete('set null')
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
        Schema::dropIfExists('blogs');
    }
}
