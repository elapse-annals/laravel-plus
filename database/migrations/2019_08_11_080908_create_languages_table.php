<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key_word');
            $table->string('code', 2);
            $table->string('key_value');
            $table->timestamp('created_at')->useCurrent();
            $table->string('created_by', 80);
            $table->timestamp('updated_at')->default(
                DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')
            );
            $table->string('updated_by', 80);
            $table->timestamp('deleted_at')->nullable();
            $table->string('deleted_by', 80)->nullable();
            $table->index(['key_word', 'code']);
            $table->comment = '语言';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('languages');
    }
}
