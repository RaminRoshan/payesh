<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWsWebServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ws_web_services', function (Blueprint $table) {
            $table->id()->comment('شناسه');
            $table->string('code')->comment('کد وب سرویس')->unique();
            $table->string('name')->comment('عنوان');
            $table->longText('description')->nullable()->comment('توضیحات');
            $table->tinyInteger('active')->default(1)->comment('فعال');
            $table->text('help')->nullable()->comment('لینک راهنما');
            $table->timestamps();
        });

        DB::table('menus')->insert([
            'order' => '4',
            'parent_id' => '3',
            'name' => 'WebService',
            'packeage' => 'PishgamanApiLang',
            'route' => 'WebService',
            'icon' => 'fa fa-globe',
        ]);        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ws_web_services');
    }
}
