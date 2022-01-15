<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGLAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('g_l_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('account');
            $table->string('name');
            $table->string('status');
            $table->longText('desc')->nullable();
            $table->integer('posting_account')->nullable();
            $table->string('type');
            $table->string('designation');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('g_l_accounts');
    }
}
