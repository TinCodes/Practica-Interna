<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WordTestController extends Controller
{
    public function createWordDocx(){
        $actividades = \App\Actividad::all();                
        $cont = 1;
        foreach ($actividades as $actividad) {
            $users[] = \App\User::where('id', $actividad->id_persona)->first();
        }

        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $filename = 'InformeFinal.docx';
        $newSection = $phpWord->addSection();

        $section = $phpWord->addSection();
        $section->getStyle()->setBreakType('continuous');

        $tableStyle = array('borderSize' => 1, 'borderColor' => '999999', 'afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0  );
        $styleCell = array('borderTopSize'=>1 ,'borderTopColor' =>'black','borderLeftSize'=>1,'borderLeftColor' =>'black','borderRightSize'=>1,'borderRightColor'=>'black','borderBottomSize' =>1,'borderBottomColor'=>'black' );
        $fontStyle = array('italic'=> true, 'size'=>10, 'name'=>'Arial','afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0 );
        $TfontStyle = array('bold'=>true, 'size'=>11, 'name' => 'Arial', 'afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0);
        $cfontStyle = array('allCaps'=>true,'italic'=> true, 'size'=>10, 'name' => 'Arial','afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0);
        $noSpace = array('spaceAfter' => 0);

        $styleTable = array('borderSize' => 6, 'borderColor' => '999999');
        $cellRowSpan = array('vMerge' => 'restart', 'valign' => 'center', 'bgColor' => 'FFFF00');
        $cellRowContinue = array('vMerge' => 'continue');
        $cellColSpan = array('gridSpan' => 2, 'valign' => 'center');
        $cellHCentered = array('align' => 'bottom');
        $cellVCentered = array('valign' => 'bottom');
       
        $source = 'img/marcaupb.jpg';
        $hoy = getdate();
        $d = $hoy['mday'];
        $m = $hoy['mon'];
        $y = $hoy['year'];

        $header = $newSection->addHeader();
        $header->firstPage();
        $table = $header->addTable();
        $table->addRow();
        $table->addCell(1500,$styleCell)->addImage(
            $source,
            array('width' => 100, 'height' => 40, 'align' => 'left')
        );
        $cell = $table->addCell(5500,$styleCell);
        $cell->addText('Informe auditoria <w:br/> GQ.PD.F. 08 <w:br/> AUDITORÍA INTERNA N° (I-2000)',$TfontStyle, ['align' => \PhpOffice\PhpWord\Style\Cell::VALIGN_CENTER ]);
        $phpWord->addParagraphStyle('pStyler', array('align' => 'right'));
        $cell2 = $table->addCell(3000,$styleCell,'pStyler');
        $cell2 = $cell2->addText(' Pagina 1/11 <w:br/> Versión 1.2/Julio 2012 <w:br/> FECHA ' .$d. '/' .$m.'/' .$y.' ');

        $subsequent = $newSection->addHeader();
        $table3 = $subsequent->addTable();
        $table3->addRow();
        $table3->addCell(1500,$styleCell)->addImage(
            $source,
            array('width' => 100, 'height' => 40, 'align' => 'left')
        );
        $cell3 = $table3->addCell(5500,$styleCell);
        $cell3->addText('Informe auditoria <w:br/> GQ.PD.F. 08 <w:br/> AUDITORÍA INTERNA N° (I-2000)',$TfontStyle, ['align' => \PhpOffice\PhpWord\Style\Cell::VALIGN_CENTER ]);
        $phpWord->addParagraphStyle('pStyler', array('align' => 'right'));
        $cell4 = $table3->addCell(3000,$styleCell,'pStyler');
        $cell4 = $cell4->addText(' Pagina 1/11 <w:br/> Versión 1.2/Julio 2012 <w:br/> FECHA ' .$d. '/' .$m.'/' .$y.' ');

        $phpWord->setDefaultParagraphStyle(
            array(
                'alignment'  => \PhpOffice\PhpWord\SimpleType\Jc::BOTH,
                'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(1),
                'spacing'    => 50,
            )
        );
        /*$source = 'http://php.net/images/logos/php-med-trans-light.gif';
        $section->addText(htmlspecialchars("Remote image from: {$source}"));
        $section->addImage($source);*/
        
        $center = $phpWord->addParagraphStyle('p2Style', array('align'=>'center','marginTop' => 1));

        $table2 = $section->addTable('myOwnTableStyle',array('borderSize' => 1, 'borderColor' => '999999', 'afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>1  ));
        $table2->addRow(-0.5, array('exactHeight' => -5));
        $table2->addCell(1500,$styleCell)->addText(' PARA: ', $TfontStyle);
        $table2->addCell(5500,$styleCell)->addText(' Manuel Olave Ph.D');
        $table2->addRow();
        $table2->addCell(1500,$styleCell)->addText(' DE: ', $TfontStyle);
        $table2->addCell(5500,$styleCell)->addText(' Ing. Andrea Fernández Delgadillo');
        $table2->addRow();
        $table2->addCell(1500,$styleCell)->addText(' FECHA: ', $TfontStyle);
        $table2->addCell(5500,$styleCell)->addText(' de X de ' . $y);
        $section->addText(' ',  $center);
        $section->addText('1. ANTECEDENTES',  $TfontStyle);
        $section->addText('Con la finalidad de determinar la conformidad del SGC de la UPB, verificar su eficacia y determinar el grado de atención a las observaciones de la auditoría externa, se llevó a cabo la 27va Auditoría Interna al Sistema de Gestión de Calidad de la UPB, los días 00 y 00 de SAMPLE de ' .$y. ' en la ciudad de La Paz y los días 00 y 00 de SAMPLE de ' .$y. ' en la ciudad de Cochabamba.');
        $section->addText(' ',  $center);
        $section->addText('2. OBJETIVOS DE LA AUDITORÍA',  $TfontStyle);
        $section->addText('Los objetivos establecidos para la Auditoría interna fueron:');
        $section->addListItem(htmlspecialchars('Revisar el grado de atención de los planes de acción derivados de la Auditoría externa TUV' .$y. ''));
        $section->addListItem(htmlspecialchars('Determinar la conformidad del Sistema de Gestión de Calidad de la UPB, de acuerdo a los requisitos establecidos en la Norma ISO 9001:2008.'));
        $section->addListItem(htmlspecialchars('Verificar la eficacia del Sistema de Gestión de Calidad y su implementación.'));
        $section->addListItem(htmlspecialchars('Detectar oportunidades de mejora.'));
        $section->addTextBreak(1);

        $section->addText('3. ALCANCE',  $TfontStyle);
        $section->addText('Durante la auditoría se revisaron los procesos del Sistema de Gestión de Calidad de UPB, aplicables al cumplimiento de los requisitos de la norma ISO 9001:2008:');
        $section->addText(' ',  $center);
        $section->addTitle(htmlspecialchars('4. Sistema de Gestión de Calidad'));
        $section->addTitle(htmlspecialchars('5. Responsabilidad de la dirección'));
        $section->addTitle(htmlspecialchars('6. Gestión de los recursos'));
        $section->addTitle(htmlspecialchars('7. Prestación de servicio'));
        $section->addTitle(htmlspecialchars('6. Medición, Análisis y Mejora'));
        $section->addText('El periodo que fue revisado es del XX de enero del 20XX a la fecha de la auditoría.');
        
        $section->addTextBreak(1);

        $section->addText('4. CRITERIOS DE AUDITORÍA',  $TfontStyle);
        $section->addText('Los requisitos de la Norma ISO 9001: 2008 se utilizaron como criterios de la auditoría, adicionalmente durante la auditoría se revisaron los siguientes documentos del Sistema de Gestión de Calidad: Visión, Misión, Organigrama de UPB, Política de Calidad, Objetivos de Calidad, Procedimientos, Planes, Programas, Registros/Formatos, Manual de Calidad, Manual de Procedimientos y otros documentos del SGC.');
        $section->addText(' ',  $center);
        
        $section->addText('5. PLAN DE AUDITORÍA',  $TfontStyle);
        $section->addText('Durante la auditoría se efectuaron entrevistas al personal de las diferentes áreas de la Universidad en las ciudades de La Paz y Cochabamba:');
        $section->addPageBreak();
        $section->addTextBreak(1);
        $table3 = $section->addTable('myOwnTableStyle',array('borderSize' => 1, 'borderColor' => '999999', 'afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>1  ));
        $table3->addRow(-0.5, array('exactHeight' => -5));
        $table3->addCell(500,$styleCell)->addText(' No ', $TfontStyle);
        $table3->addCell(4500,$styleCell)->addText('NOMBRE Y APELLIDO', $TfontStyle);
        $table3->addCell(5500,$styleCell)->addText('CARGO', $TfontStyle);
        $table3->addRow();
        $table3->addCell(500,array('bgColor'=>"80eaff"))->addText('');
        $table3->addCell(4500,array('bgColor'=>"80eaff"))->addText(' COCHABAMBA', $TfontStyle);
        $table3->addCell(5500,array('bgColor'=>"80eaff"))->addText('');
        foreach($users as $user){
            if($user->campus == "Cochabamba"){
                $table3->addRow();
                $table3->addCell(500,$styleCell)->addText($cont);
                $table3->addCell(4500,$styleCell)->addText($user->nombre);
                $table3->addCell(5500,$styleCell)->addText($user->cargo);   
                $cont++; 
            }
        }

        $table3->addRow();
        $table3->addCell(500,array('bgColor'=>"80eaff"))->addText('');
        $table3->addCell(4500,array('bgColor'=>"80eaff"))->addText(' LA PAZ', $TfontStyle);
        $table3->addCell(5500,array('bgColor'=>"80eaff"))->addText('');
        $cont=0;
        foreach($users as $user){
            if($user->campus == "La Paz"){
                $table3->addRow();
                $table3->addCell(500,$styleCell)->addText($cont);
                $table3->addCell(4500,$styleCell)->addText($user->nombre);
                $table3->addCell(5500,$styleCell)->addText($user->cargo);   
                $cont++; 
            }
        }
        $section->addTextBreak(1);
        $section->addText('6. PERSONAL AUDITADO',  $TfontStyle);
        $section->addText('Durante la auditoría se efectuaron entrevistas al personal de las diferentes áreas de la Universidad en las ciudades de La Paz y Cochabamba:');
        $section->addTextBreak(1);
        $section->addText('7. EQUIPO AUDITOR',  $TfontStyle);
        $section->addText('El equipo auditor estuvo conformado por las auditoras: Ing. Andrea Fernández e Ing. Jesica Rivera');
        $section->addTextBreak(1);

        $section->addText('8. RESUMEN DE LA AUDITORÍA',  $TfontStyle);
        $section->addText('La auditoría se llevó a cabo tomando como base el Plan de Auditoría I - 2016, efectuándose ajustes a los horarios de acuerdo a la disponibilidad del personal auditado y del equipo auditor.');
        $section->addText('La auditoría cumplió con su objetivo, ya que se evaluó el nivel de cumplimiento con la norma ISO 9001:2008 y se detectaron las áreas de oportunidad de mejora para que el Sistema de Gestión de Calidad de la UPB cumpla con los requisitos establecidos en la Norma ISO 9001:2008.');
        
        $section->addTextBreak(1);

        $section->addText('9. INFORME DE HALLAZGOS',  $TfontStyle);
        $section->addText('El presente informe presenta los hallazgos de la auditoría, más no se hace referencia a la conformidad, dado que el fin último es la atención de las oportunidades de mejora.');
        $section->addText('A continuación se presentan los hallazgos de la auditoría, catalogados en dos grupos:');
        $section->addListItem(htmlspecialchars('Observaciones: Incumplimientos menores o fallas aisladas.'));
        $section->addListItem(htmlspecialchars('No conformidades: Incumplimientos a la norma que pueden afectar la eficacia del SGC de la UPB.'));
        $section->addText('Adicionalmente, se incluyen recomendaciones, las cuales se pronuncian con el fin de sugerir la emisión de acciones de mejora para evitar que los hallazgos se conviertan en no conformidades que pongan el riesgo el SGC.');
        $section->addTextBreak(1);
        $section->addText('Aclaración: Debido a que el presente informe hace referencia al enfoque en procesos, a continuación se despliega un índice de reporte de hallazgos por macro proceso.');
        $section->addTextBreak(1);
        $objectWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord,'Word2007');
        try {
            //dd($users);
            $objectWriter->save(storage_path($filename));
        } catch (Exception $e){}

        return response()->download(storage_path($filename));
    }
}
