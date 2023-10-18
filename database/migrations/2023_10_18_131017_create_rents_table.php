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
        Schema::create('rents', function (Blueprint $table) {
            $table->ulid()->primary();
            $table->foreignUlid("vehicle_id")->constrained()->onUpdate("cascade")->onDelete("cascade");
            $table->foreignUlid("user_rent_id")->constrained(table: 'users', column: 'id')->onUpdate("cascade")->onDelete("cascade");
            $table->foreignUlid("user_approve_id_1")->constrained(table: 'users', column: 'id')->onUpdate("cascade")->onDelete("cascade");
            $table->foreignUlid("user_approve_id_2")->constrained(table: 'users', column: 'id')->onUpdate("cascade")->onDelete("cascade");
            $table->boolean("approve_status_1");
            $table->boolean("approve_status_2");
            $table->enum("status", ["wait for approval", "on going", "finished"]);
            $table->date("StartAt");
            $table->date("EndAt");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rents');
    }
};
