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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            // Client Data
            $table->string("ClientName");
            $table->string("phone");
            $table->string("mail");
            // Coach Data
            $table->string("CoashName");
            $table->dateTime('chosen_datetime');
//            $table->date("ReservationDay");
//            $table->time("ReservationTime");
            $table->boolean("Trigger")->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_client_coash__data');
    }
};
