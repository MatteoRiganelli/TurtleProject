<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMountainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mountains', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->nullable(false);
            $table->text('name')->nullable(false);
            $table->unsignedInteger('city_id')->default(1);
            $table->unsignedInteger('province_id')->default(1);
            $table->unsignedInteger('region_id')->default(1);
            $table->unsignedInteger('nation_id')->default(1);
            $table->foreign('city_id')->references('id')->on('city');
            $table->foreign('province_id')->references('id')->on('province');
            $table->foreign('region_id')->references('id')->on('region');
            $table->foreign('nation_id')->references('id')->on('nation');
            $table->decimal('latitude', 10, 7)->nullable(false);
            $table->decimal('longitude',10, 7)->nullable(false);
            $table->decimal('altitude', 10, 7)->nullable(false);
            $table->boolean('status')->default(true);
            $table->string('description')->default(' ');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mountains');
    }
}
