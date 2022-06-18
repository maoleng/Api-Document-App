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
        Schema::create('methods', function (Blueprint $table) {
            $table->id();
            $table->string('name', 10);
            $table->string('url', 250);
            $table->text('description');
            $table->foreignId('body_id')->nullable()->constrained('bodies');
            $table->foreignId('response_id')->nullable()->constrained('responses');
            $table->foreignId('header_id')->nullable()->constrained('headers');
            $table->text('note')->nullable();
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
        Schema::dropIfExists('methods');
    }
};
