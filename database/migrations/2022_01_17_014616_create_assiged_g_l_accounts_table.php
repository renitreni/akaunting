<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssigedGLAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assiged_g_l_accounts', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_g_l_account_id')->nullable();
            $table->integer('child_g_l_account_id')->nullable();
            $table->integer('chart_of_account_id')->nullable();
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
        Schema::dropIfExists('assiged_g_l_accounts');
    }
}
