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
        Schema::dropIfExists('portfolio_technology');
        Schema::create('portfolio_technology', function (Blueprint $table) {

            $table->unsignedBigInteger('portfolio_id');

            $table->foreign('portfolio_id')
                            ->references('id')
                            ->on('portfolios')
                            ->cascadeOnDelete();


            $table->unsignedBigInteger('technology_id');

            $table->foreign('technology_id')
                            ->references('id')
                            ->on('technologies')
                            ->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('portfolio_technology');
    }
};
