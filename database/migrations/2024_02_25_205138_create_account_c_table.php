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
        Schema::create('account_c', function (Blueprint $table) {
            $table->id();
            $table->integer('status');
            $table->float('ammount');
            $table->string('ribNumber')->unique();
            $table->unsignedBigInteger('idUser');
            $table->foreign('idUser')->references('id')->on('users');
            $table->unsignedBigInteger('idPack');
            $table->foreign('idPack')->references('id')->on('pack');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account_c');
    }
};
