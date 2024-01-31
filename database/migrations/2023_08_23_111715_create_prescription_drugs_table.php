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
        Schema::create('prescription_drugs', function (Blueprint $table) {
            $table->id();
            $table->string('drug_name');
            $table->string('drug_time');
            $table->string('drug_dosage');
            $table->foreignId('prescription_id'); // foreign key
           $table->foreign('prescription_id')->references('id')->on('prescriptions')->onUpdate('cascade')->onDelete('cascsde');
          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescription_drugs');
    }
};
