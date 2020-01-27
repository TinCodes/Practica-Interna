<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatesElemcalidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elemCalidads', function (Blueprint $table) {
            $table->bigIncrements('id_elem_calidad');
            $table->text('nombre');
            $table->string('indice');
            $table->timestamps();
        });

        \Illuminate\Support\Facades\DB::table('elemCalidads')->insert([
            ['nombre' => '4. CONTEXTO DE LA ORGANIZACIÓN', 'indice' => '4' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '4.1 Comprensión de la organización y de su contexto', 'indice' => '4.1' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '4.2 Comprensión de las necesidades y expectativas de las partes interesadas', 'indice' => '4.2' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '4.3 Determinación del alcance del sistema de gestión de la calidad', 'indice' => '4.3' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '4.4 Sistema de gestión de la calidad y sus procesos', 'indice' => '4.4' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '5. LIDERAZGO', 'indice' => '5' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '5.1 Liderazgo y compromiso', 'indice' => '5.1' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '5.1.1 Generalidades', 'indice' => '5.1.1' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '5.1.2 Enfoque al cliente', 'indice' => '5.1.2' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '5.2 Política', 'indice' => '5.2' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '5.2.1 Establecimiento de la política de la calidad', 'indice' => '5.2.1' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '5.2.2 Comunicación de la política de la calidad', 'indice' => '5.2.2' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '5.3 Roles, responsabilidades y autoridades en la organización', 'indice' => '5.3' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '6. PLANIFICACIÓN', 'indice' => '6' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '6.1 Acciones para abordar riesgos y oportunidades', 'indice' => '6.1' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '6.2 Objetivos de la calidad y planificación para lograrlos', 'indice' => '6.2' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '6.3 Planificación de los cambios', 'indice' => '6.3' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '7. APOYO', 'indice' => '7' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '7.1 Recursos', 'indice' => '7.1' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '7.1.1 Generalidades', 'indice' => '7.1.1' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '7.1.2 Personas', 'indice' => '7.1.2' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '7.1.3 Infraestructura', 'indice' => '7.1.3' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '7.1.4 Ambiente para la operación de los procesos', 'indice' => '7.1.4' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '7.1.5 Recursos de seguimiento y medición', 'indice' => '7.1.5' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '7.1.5.1 Generalidades', 'indice' => '7.1.5.1' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '7.1.5.2 Trazabilidad de las mediciones', 'indice' => '7.1.5.2' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '7.1.6 Conocimientos de la organización', 'indice' => '7.1.6' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '7.2 Competencia', 'indice' => '7.2' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '7.3 Toma de conciencia', 'indice' => '7.3' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '7.4 Comunicación', 'indice' => '7.4' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '7.5 Información documentada', 'indice' => '7.5' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '7.5.1 Generalidades', 'indice' => '7.5.1' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '7.5.2 Creación y actualización', 'indice' => '7.5.2' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '7.5.3 Control de la información documentada', 'indice' => '7.5.3' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '8. OPERACIÓN', 'indice' => '8' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '8.1 Planificación y control operacional', 'indice' => '8.1' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '8.2 Requisitos para los productos y servicios', 'indice' => '8.2' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '8.2.1 Comunicación con el cliente', 'indice' => '8.2.1' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '8.2.2 Determinación de los requisitos para los productos y servicios', 'indice' => '8.2.2' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '8.2.3 Revisión de los requisitos para los productos y servicios', 'indice' => '8.2.3' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '8.2.4 Cambios en los requisitos para los productos y servicios', 'indice' => '8.2.4' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '8.3 Diseño y desarrollo de los productos y servicios', 'indice' => '8.3' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '8.3.1 Generalidades', 'indice' => '8.3.1' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '8.3.2 Planificación del diseño y desarrollo', 'indice' => '8.3.2' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '8.3.3 Entradas para el diseño y desarrollo', 'indice' => '8.3.3' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '8.3.4 Controles del diseño y desarrollo', 'indice' => '8.3.4' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '8.3.5 Salidas del diseño y desarrollo', 'indice' => '8.3.5' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '8.3.6 Cambios del diseño y desarrollo', 'indice' => '8.3.6' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '8.4 Control de los procesos, productos y servicios suministrados externamente', 'indice' => '8.4' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '8.4.1 Generalidades', 'indice' => '8.4.1' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '8.4.2 Tipo y alcance del control', 'indice' => '8.4.2' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '8.4.3 Información para los proveedores externos', 'indice' => '8.4.3' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '8.5 Producción y provisión del servicio', 'indice' => '8.5' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '8.5.1 Control de la producción y de la provisión del servicio', 'indice' => '8.5.1' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '8.5.2 Identificación y trazabilidad', 'indice' => '8.5.2' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '8.5.3 Propiedad perteneciente a los clientes o proveedores externos', 'indice' => '8.5.3' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '8.5.4 Preservación', 'indice' => '8.5.4' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '8.5.5 Actividades posteriores a la entrega', 'indice' => '8.5.5' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '8.5.6 Control de los cambios', 'indice' => '8.5.6' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '8.6 Liberación de los productos y servicios', 'indice' => '8.6' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '8.7 Control de las salidas no conformes', 'indice' => '8.7' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '9. EVALUACIÓN DEL DESEMPEÑO', 'indice' => '9' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '9.1 Seguimiento, medición, análisis y evaluación ', 'indice' => '9.1' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '9.1.1 Generalidades', 'indice' => '9.1.1' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '9.1.2 Satisfacción del cliente', 'indice' => '9.1.2' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '9.1.3 Análisis y evaluación', 'indice' => '9.1.3' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '9.2 Auditoría interna', 'indice' => '9.2' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '9.3 Revisión por la dirección', 'indice' => '9.3' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '9.3.1 Generalidades', 'indice' => '9.3.1' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '9.3.2 Entradas de la revisión por la dirección', 'indice' => '9.3.2' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '9.3.3 Salidas de la revisión por la dirección', 'indice' => '9.3.3' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '10. MEJORA', 'indice' => '10' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '10.1 Generalidades', 'indice' => '10.1' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '10.2 No conformidad y acción correctiva', 'indice' => '10.2' , 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => '10.3 Mejora continua', 'indice' => '10.3' , 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('elemCalidads');
    }
}
