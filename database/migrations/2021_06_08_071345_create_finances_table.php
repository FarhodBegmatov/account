<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tip_id');
            $table->unsignedBigInteger('category_id');
            $table->date('date');
            $table->integer('summa');
            $table->integer('overall')->nullable();
            $table->string('comment')->nullable();
            $table->timestamps();

            $table->foreign('tip_id')->references('id')
                ->on('tips')
                ->onDelete('cascade');
            $table->foreign('category_id')->references('id')
                ->on('categories')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('finances');
    }
}
