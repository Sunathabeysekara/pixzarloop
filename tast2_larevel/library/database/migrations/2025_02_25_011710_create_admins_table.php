<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('admins', function (Blueprint $table) {
        $table->id();
        $table->string('userid')->unique();//user id is the Primary key
        $table->string('password');
        $table->timestamps();
    });
}


    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
