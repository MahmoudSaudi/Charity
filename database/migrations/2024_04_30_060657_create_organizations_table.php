<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
            $table->string("email")->unique();
            $table->string("address");
            $table->longText("description");
            $table->string("phone_number")->unique();
            $table->string("password");
            $table->string("image");
            $table->dateTime("established_year");
            $table->dateTime("registration_date");
            $table->tinyInteger("is_active")->default(0)->comment('0 refers to not active ');
            $table->tinyInteger("has_delegate")->default(1)->comment('1 refers to active ');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};
