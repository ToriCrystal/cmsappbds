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
        Schema::create('commission_detail', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('commission_id');
            $table->bigInteger('articles_id');
            $table->bigInteger('total_amount');
            $table->bigInteger('amount_paid')->default(0);
            $table->decimal('amount_percent', 10, 2)->default(0);
            $table->tinyInteger('status');

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
        Schema::dropIfExists('commission_detail');
    }
};
