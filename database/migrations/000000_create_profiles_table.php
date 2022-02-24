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
        Schema::create('profiles', function (Blueprint $table) {
            $table->char('id', 21)->primary();
            $table->char('user_id', 21);
            $table->char('position_id', 21);
            $table->char('section_id', 21);
            $table->char('department_id', 21);
            $table->string('name')->nullable();
            $table->string('name_en')->nullable();
            $table->date('start_date');
            $table->enum('employee_status', ['-', 'part_time', 'outsource', 'employee'])->nullable()->default('-');
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
        Schema::dropIfExists('profiles');
    }
};
