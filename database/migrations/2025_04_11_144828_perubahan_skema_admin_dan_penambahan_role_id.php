<?php

use App\Models\User;
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
            $table->string('role_id')->after('email_verified_at')->default('user');
            $table->string('barcode')->nullable()->change();
            $table->string('salutation')->nullable()->change();
            $table->string('telephone')->nullable()->change();
            $table->string('company')->nullable()->change();
            $table->string('job')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            User::whereNull('barcode')->update(['barcode' => '']);
            User::whereNull('salutation')->update(['salutation' => '']);
            User::whereNull('telephone')->update(['telephone' => '']);
            User::whereNull('company')->update(['company' => '']);
            User::whereNull('job')->update(['job' => '']);

            Schema::table('users', function (Blueprint $table) {
                // $table->dropColumn('role_id');
                $table->string('barcode')->change();
                $table->string('salutation')->change();
                $table->string('telephone')->change();
                $table->string('company')->change();
                $table->string('job')->change();
            });
        });
    }
};
