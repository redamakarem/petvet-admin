<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('vet_proffesion_id')->nullable();
            $table->foreign('vet_proffesion_id', 'vet_proffesion_fk_4920043')->references('id')->on('vet_proffesions');
            $table->unsignedBigInteger('current_location_id')->nullable();
            $table->foreign('current_location_id', 'current_location_fk_4920072')->references('id')->on('vet_locations');
        });
    }
}
