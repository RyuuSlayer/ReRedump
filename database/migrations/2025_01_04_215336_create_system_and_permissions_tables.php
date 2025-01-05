<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Add display_name to permissions table
        Schema::table('permissions', function (Blueprint $table) {
            $table->string('display_name')->nullable()->after('name');
        });

        // Create systems table
        Schema::create('systems', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Create system_permissions table
        Schema::create('system_permissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('permission_id')->constrained()->onDelete('cascade');
            $table->foreignId('system_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->unique(['permission_id', 'system_id', 'user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('system_permissions');
        Schema::dropIfExists('systems');
        Schema::table('permissions', function (Blueprint $table) {
            $table->dropColumn('display_name');
        });
    }
};
