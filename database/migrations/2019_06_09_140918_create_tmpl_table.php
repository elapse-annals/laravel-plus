<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTmplTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tmpls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique()->comment('名称');
            $table->tinyInteger('sex')->comment('性别');
            $table->timestamp('created_at')->useCurrent();
            $table->string('created_by', 80);
            $table->timestamp('updated_at')->default(
                DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')
            );
            $table->string('updated_by', 80);
            $table->timestamp('deleted_at')->nullable();
            $table->string('deleted_by', 80)->nullable();
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
        Schema::drop('tmpls');
    }
}
