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
        Schema::create('employee_addresses', function (Blueprint $table) {
            $table->char('id', 21)->primary();
            $table->char('profile_id', 21);
            $table->enum('address_type', ['-', 'Current', 'Home'])->nullable()->default('-');
            $table->string('address_1');
            $table->string('address_2')->nullable()->default('-');
            $table->string('street')->nullable()->default('-');
            $table->char('tombon_id', 21);
            $table->string('tel_no')->nullable()->default('-');
            $table->json('tel_ext')->nullable()->default('-');
            $table->string('fax_no')->nullable()->default('-');
            $table->boolean('is_active')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('profile_id')->references('id')->on('profiles')->cascadeOnDelete();
            $table->foreign('tombon_id')->references('id')->on('tombons')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_addresses');
    }
};
