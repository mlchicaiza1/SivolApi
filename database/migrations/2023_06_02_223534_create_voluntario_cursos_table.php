<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoluntarioCursosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voluntario_cursos', function (Blueprint $table) {
            $table->id('id');
            $table->string('id_curso');
            $table->string('fecha_inicio');
            $table->string('fecha_fin');
            $table->string('ambito_curso');
            $table->int('id_tipo_curso');
            $table->string('plataforma_elearning');
            $table->string('descripcion');
            $table->string('instructor');
            $table->int('id_prov_lug');
            $table->int('id_ciu_lug');
            $table->string('institucion');
            $table->string('becado');
            $table->string('tipo_titulo_curso');
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
        Schema::drop('voluntario_cursos');
    }
}
