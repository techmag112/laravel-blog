<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('roles')) {
            DB::table('roles')->insert([
                'id' => 1,
                'type' => 'guest',
            ]);
            DB::table('roles')->insert([
                'id' => 2,
                'type' => 'user',
            ]);
            DB::table('roles')->insert([
                'id' => 3,
                'type' => 'author',
            ]);
            DB::table('roles')->insert([
                'id' => 4,
                'type' => 'admin',
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('roles')->delete();
    }
};
