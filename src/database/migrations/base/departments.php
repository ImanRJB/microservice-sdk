<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            (isBase('departments')) ? $table->id() : $table->unsignedBigInteger('id')->primary();
            $table->string('name');
            $table->string('label');
            $table->timestamps();
        });

        if (checkRelation('admins')) {
            Schema::create('admin_department', function (Blueprint $table) {
                $table->unsignedBigInteger('admin_id');
                $table->unsignedBigInteger('department_id');

                $table->foreign('department_id')
                    ->references('id')
                    ->on('departments')
                    ->onDelete('cascade');

                $table->foreign('admin_id')
                    ->references('id')
                    ->on('admins')
                    ->onDelete('cascade');

                $table->primary(['department_id', 'admin_id']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
        if (checkRelation('admins')) {
            Schema::dropIfExists('department_admin');
        }
    }
}
