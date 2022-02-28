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
        Schema::create('menu_items', function (Blueprint $table) {
            $table->char('id', 21)->primary();
            $table->boolean('is_dash')->nullable()->default(false);
            $table->integer('seq');
            $table->enum('menu_group', ['Main', 'User']);
            $table->string('name')->unique();
            $table->string('font_icon')->nullable()->default('fas fa-home');
            $table->enum('menu_method', ['get', 'post', 'put', 'delete'])->nullable()->default('get');
            $table->string('route_name');
            $table->string('text_color')->nullable()->default('pink-500');
            $table->string('over_hover')->nullable()->default('pink-500');
            $table->longText('description')->nullable();
            $table->boolean('for_admin')->nullable()->default(false);
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
        Schema::dropIfExists('menu_items');
    }
};
