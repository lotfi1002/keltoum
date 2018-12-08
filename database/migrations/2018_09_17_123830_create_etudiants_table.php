<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->increments('id');
             $table->string('firstname')->nullable();
            $table->string('lastname')->nullable() ;
            $table->string('arabicfirstname')->nullable() ;
            $table->string('arabiclastname')->nullable() ;
            $table->string('address')->nullable() ;
            $table->string('arabicaddress')->nullable() ;
            $table->string('cne')->nullable(); 
            $table->string('codemassar')->nullable(); 
            $table->date('datenaissance')->nullable(); 
            $table->string('lieunaissance')->nullable(); 
            $table->string('lieunaissancearab')->nullable(); 
            $table->string('sexe')->nullable(); 
            $table->string('autre')->nullable(); 
            $table->date('datecreation')->nullable(); 
            $table->string('nompere')->nullable(); 
            $table->string('nommere')->nullable(); 
            $table->string('cinpere')->nullable(); 
            $table->string('telepere')->nullable(); 
            $table->string('telemere')->nullable(); 
            $table->string('email')->nullable(); 
            $table->string('active')->nullable(); 
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
        Schema::dropIfExists('etudiants');
    }
}
