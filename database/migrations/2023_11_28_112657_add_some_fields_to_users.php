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
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone_number')->nullable()->after('email_verified_at');
            $table->text('bio')->nullable()->after('phone_number');
            $table->string('professional_title')->default('Web Developer')->nullable()->after('bio');
            $table->string('big_avatar')->nullable()->after('professional_title');
            $table->string('address')->nullable()->after('big_avatar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(
                'phone_number',
                'bio',
                'professional_title',
                'big_avatar',
                'address',
            );
        });
    }
};
