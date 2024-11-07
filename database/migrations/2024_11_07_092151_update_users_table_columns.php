<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'code')) {
                $table->string('code', 9)->nullable()->after('email');
            }

            if (!Schema::hasColumn('users', 'rfc')) {
                $table->string('rfc', 13)->nullable()->after('code');
            }

            if (!Schema::hasColumn('users', 'active')) {
                $table->boolean('active')->default(true)->after('rfc');
            }

            if (!Schema::hasColumn('users', 'last_name')) {
                $table->string('last_name')->nullable()->after('name');
            }

            if (!Schema::hasColumn('users', 'gender')) {
                $table->string('gender', 1)->nullable()->after('rfc');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'code')) {
                $table->dropColumn('code');
            }

            if (Schema::hasColumn('users', 'rfc')) {
                $table->dropColumn('rfc');
            }

            if (Schema::hasColumn('users', 'active')) {
                $table->dropColumn('active');
            }

            if (Schema::hasColumn('users', 'last_name')) {
                $table->dropColumn('last_name');
            }

            if (Schema::hasColumn('users', 'gender')) {
                $table->dropColumn('gender');
            }
        });
    }
};
