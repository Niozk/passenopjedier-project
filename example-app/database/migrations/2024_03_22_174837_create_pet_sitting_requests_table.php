<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('pet_sitting_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('pet_name');
            $table->string('species');
            $table->string('breed');
            $table->integer('age');
            $table->text('description');
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('hourly_rate', 8, 2);
            $table->string('picture')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pet_sitting_requests');
    }
};

