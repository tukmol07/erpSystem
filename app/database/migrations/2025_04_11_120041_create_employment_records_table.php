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
        Schema::create('employment_records', function (Blueprint $table) {
            $table->id();
            $table->string('employee_name');
            $table->string('employee_number');
            $table->string('visa_number');
            $table->string('category_resident');
            $table->string('nationality');
            $table->date('date_arrival');
            $table->date('date_hired');
            $table->string('kiwa_contract_number');
            $table->decimal('salary', 10, 2);
            $table->string('educational_background');
            $table->string('skills');
            $table->string('ticket_provided');
            $table->integer('residence_renewal')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('employment_records');
    }
};
