<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('admin_id')->nullable();
            $table->string('code')->nullable();
            $table->integer('type')->nullable();
            $table->string('title');
            $table->text('slug')->nullable();
            $table->longText('description')->nullable();
            $table->bigInteger('area');
            $table->integer('price');
            $table->boolean('price_consent')->nullable();
            $table->integer('quantity');
            $table->bigInteger('height_floor')->nullable();
            $table->bigInteger('project_size');
            $table->string('investor')->nullable();
            $table->string('constructor')->nullable();
            $table->string('operative_management')->nullable();
            $table->string('hand_over')->nullable();
            $table->dateTime('deployment_time')->nullable();
            $table->bigInteger('building_density')->nullable();
            $table->text('utilities')->nullable();
            $table->longText('image');
            $table->string('name_contact')->nullable();
            $table->string('phone_contact');
            $table->integer('status')->default(1);
            $table->integer('active_days')->nullable();
            $table->dateTime('time_start')->nullable();
            $table->bigInteger('district_id');
            $table->bigInteger('ward_id');
            $table->bigInteger('province_id');
            $table->bigInteger('article_status')->default(1);
            $table->bigInteger('commission_id');
            $table->bigInteger('houseType');
            $table->integer('active_status')->default(1);
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
        Schema::dropIfExists('articles');
    }
};
