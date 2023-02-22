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
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone', 20)->nullable();
            $table->date('birthdate')->nullable();
            $table->string('address', 100)->nullable();
            $table->text('details')->nullable();
            $table->binary('profile_photo')->nullable();
            $table->enum('type', ['admin', 'employee', 'user'])->default('user');
            $table->enum('status', ['active', 'inactive'])->default('active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone', 'birthdate', 'address', 'details', 'profile_photo', 'type', 'status']);
        });
    }
};
