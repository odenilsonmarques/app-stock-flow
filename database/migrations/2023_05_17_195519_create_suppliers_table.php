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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type_supplier');
            $table->string('cpf_cnpj');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('cep')->nullable();
            $table->string('road')->nullable();
            $table->string('identification_number')->nullable();
            $table->string('complement')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('invoice')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
