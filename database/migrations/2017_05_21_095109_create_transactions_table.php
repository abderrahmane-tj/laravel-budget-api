<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->date('done_at');
            $table->integer('payee_id')->unsigned()->nullable();
            $table->string('note')->nullable();
            $table->float('amount');
            $table->boolean('checked');
            $table->integer('category_id')->unsigned()->nullable();
            $table->integer('account_id')->unsigned();
            $table->timestamps();

            $table->foreign('payee_id')->references('id')->on('payees');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('account_id')->references('id')->on('accounts');

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
