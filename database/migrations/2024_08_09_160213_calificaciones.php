<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->id('id_calificacion');
            $table->unsignedBigInteger('idpane')->nullable();
            $table->unsignedBigInteger('producto');
            $table->tinyInteger('prueba')->comment('1=TRIANGULAR,2=DUO-TRIO,3=ORDENAMIENTO');
            $table->string('atributo', 50);
            $table->string('cod_muestras', 250);
            $table->string('comentario', 250)->nullable();
            $table->date('fecha')->nullable();
            $table->integer('cabina');
            $table->timestamps();

            // Definir claves foráneas
            $table->foreign('idpane')->references('idpane')->on('panelistas')->onDelete('set null');
            $table->foreign('producto')->references('id_producto')->on('productos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calificaciones');
    }
};
