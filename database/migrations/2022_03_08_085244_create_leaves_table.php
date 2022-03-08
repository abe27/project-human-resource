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
        Schema::create('leaves', function (Blueprint $table) {
            $table->char('id', 21)->primary();
            $table->char('profile_id', 21);
            $table->char('leave_id', 21);
            $table->date('leave_start_date');
            $table->time('leave_start_time');
            $table->date('leave_end_date')->nullable();
            $table->time('leave_end_time')->nullable();
            $table->longText('description')->nullable();
            $table->decimal('total_day', 8, 2)->nullable()->default(0);
            $table->enum('leave_type', ['-', 'Payment', 'None'])->nullable()->default('-');
            $table->boolean('is_active')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('profile_id')->references('id')->on('profiles')->cascadeOnDelete();
            $table->foreign('leave_id')->references('id')->on('leave_groups')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leaves');
    }
};
