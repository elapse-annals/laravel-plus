<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique()->comment('名称');
            $table->tinyInteger('sex')->comment('性别');
            $table->timestamps();
            $table->string('created_by', 80)->comment('创建人');
            $table->string('updated_by', 80)->comment('修改人');
            $table->index(['name', 'sex']);
            $table->comment = '内置';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('temps');
    }
}
