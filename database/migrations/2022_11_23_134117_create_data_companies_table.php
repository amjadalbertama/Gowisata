<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_companies', function (Blueprint $table) {
            $table->id();
            $table->integer('approver_id')->nullable();
            $table->string('name_company')->nullable(); 
            $table->string("office_address")->nullable(); 
            $table->string('office_email')->nullable(); 
            $table->string('office_phone')->nullable(); 
            $table->integer('nmwp_company')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_companies');
    }
}
