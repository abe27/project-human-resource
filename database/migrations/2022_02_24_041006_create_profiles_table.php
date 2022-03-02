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
            $table->uuid('user_id');
            $table->char('company_id', 21);
            $table->char('whs_id', 21);
            $table->char('position_id', 21);
            $table->char('section_id', 21);
            $table->char('department_id', 21);
            $table->char('travel_id', 21)->nullable();
            $table->char('shift_id', 21);
            $table->char('level_id', 21);
            $table->char('prefix_id', 21);
            $table->string('id_card_number', 20)->unique();
            $table->string('nick_name')->nullable()->default('-');
            $table->string('name_th')->nullable()->default('-');
            $table->string('name_en')->nullable()->default('-');
            $table->enum('sexual', ['-', 'Female', 'Male'])->nullable()->default('-');
            $table->enum('married_status', ['-', 'Single', 'Married'])->nullable()->default('-');
            $table->enum('military_status', ['-', 'Yes', 'No'])->nullable()->default('-');
            $table->date('birth_date')->nullable();
            $table->date('start_date')->nullable();
            $table->string('mobile_no')->nullable();
            $table->enum('employee_status', ['-', 'Part_Time', 'Outsource', 'Daily', 'Employee'])->nullable()->default('-');
            $table->string('avatar_url')->nullable();
            $table->boolean('is_active')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->foreign('whs_id')->references('id')->on('whs')->cascadeOnDelete();
            $table->foreign('position_id')->references('id')->on('positions')->cascadeOnDelete();
            $table->foreign('section_id')->references('id')->on('sections')->cascadeOnDelete();
            $table->foreign('department_id')->references('id')->on('departments')->cascadeOnDelete();
            $table->foreign('travel_id')->references('id')->on('travelings')->nullOnDelete();
            $table->foreign('shift_id')->references('id')->on('shifts')->cascadeOnDelete();
            $table->foreign('level_id')->references('id')->on('levels')->cascadeOnDelete();
            $table->foreign('prefix_id')->references('id')->on('prefix_names')->cascadeOnDelete();
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
