<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvinceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('province', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->text('name');
            $table->text('initial');
            $table->unsignedInteger('region_id')->default(1);
            $table->unsignedInteger('nation_id')->default(1);
            $table->foreign('region_id')->references('id')->on('region');
            $table->foreign('nation_id')->references('id')->on('nation');
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
        Schema::dropIfExists('province');
    }
}
