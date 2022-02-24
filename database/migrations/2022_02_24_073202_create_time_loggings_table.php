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
        Schema::create('time_loggings', function (Blueprint $table) {
            $table->char('id', 21)->primary();
            $table->char('emp_id', 21);
            $table->enum('scan', ['-', 'I', 'O'])->nullable()->default('-');
            $table->date('on_date');
            $table->time('on_time');
            $table->string('on_machine');
            $table->boolean('is_active')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('emp_id')->references('id')->on('employees')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('time_loggings');
    }
};
