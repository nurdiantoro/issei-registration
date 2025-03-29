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
            $table->string('barcode')->after('id');
            $table->string('salutation')->after('barcode');
            $table->string('telephone')->after('email_verified_at');
            $table->string('company')->after('telephone');
            $table->string('job')->after('company');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('barcode');
            $table->dropColumn('salutation');
            $table->dropColumn('telephone');
            $table->dropColumn('company');
            $table->dropColumn('job');
        });
    }
};
