<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Database extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function(Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('balance');
            $table->foreignId('user_id')->constrained();
        });

        Schema::create('transactions', function(Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('amount');
            $table->foreignId('account_id')->constrained();
//            $table->string('account_id')->unsigned();
//
//            $table->foreign('account_id')->references('id')->on('accounts');
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
        Schema::dropIfExists('accounts');
    }
}
