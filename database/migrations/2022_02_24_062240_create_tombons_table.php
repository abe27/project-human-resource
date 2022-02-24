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
        Schema::create('tombons', function (Blueprint $table) {
            $table->char('id', 21)->primary();
            $table->string("zip_code");
            $table->string("name");
            $table->longText("description")->nullable();
            $table->char("district_id", 21);
            $table->timestamps();
            $table->foreign('district_id')->references('id')->on('districts')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tombons');
    }
};
