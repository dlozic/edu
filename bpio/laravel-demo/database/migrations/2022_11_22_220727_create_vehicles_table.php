<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->char('vin_number', 17);
            $table->string('car_type', 30);
            $table->string('car_model', 20);
            $table->integer('number_of_doors')->default(5)->nullable();
            $table->date('registered_until')->nullable();
            $table->timestamps();
        });

        # many to many table
        Schema::create('user_vehicle', function (Blueprint $table) {
            $table->foreignId('vehicle_id')->constrained('vehicles');
            $table->foreignId('user_id')->constrained('users');
            $table->date('assigned_at');

            $table->primary(['vehicle_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
};
