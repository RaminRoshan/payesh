<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWsWebServiceAccessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ws_web_service_accesses', function (Blueprint $table) {
            $table->id()->comment('شناسه');
            $table->unsignedBigInteger('user_id')->comment('شناسه کاربر');
            $table->unsignedBigInteger('web_service_id')->comment('شناسه سرویس');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('web_service_id')->references('id')->on('ws_web_services')->onDelete('cascade');
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
        Schema::dropIfExists('ws_web_service_accesses');
    }
}
