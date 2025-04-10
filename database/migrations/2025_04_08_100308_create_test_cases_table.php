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
        Schema::create('test_cases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->string('feature');
            $table->text('description');
            $table->text('expected_result');
            $table->text('actual_result')->nullable();
            $table->enum('status', ['Pending', 'Passed', 'Failed'])->default('Pending');
            $table->enum('case_type', ['update', 'bug', 'other']);
            $table->foreignId('tester_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('assigned_dev_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->enum('fix_status', ['Not Started', 'In Progress', 'Resolved'])->default('Not Started');
            $table->date('fix_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_cases');
    }
};
