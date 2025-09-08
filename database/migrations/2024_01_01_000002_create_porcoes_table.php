<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('porcoes', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
            $table->decimal('peso', 8, 2);
            $table->foreignId('alimento_id')->constrained('alimentos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('porcoes');
    }
};