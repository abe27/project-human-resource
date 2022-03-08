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
        Schema::create('leave_groups', function (Blueprint $table) {
            $table->char('id', 21)->primary();
            $table->string('name')->unique();
            $table->longText('description')->nullable();
            $table->decimal('limit_day', 8, 2)->nullable()->default(0);
            $table->boolean('is_active')->nullable()->default(false);
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
        Schema::dropIfExists('leave_groups');
    }
};
