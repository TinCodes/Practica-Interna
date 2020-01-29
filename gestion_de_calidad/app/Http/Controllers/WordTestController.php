<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WordTestController extends Controller
{
    public function createWordDocx(){
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $filename = 'InformeFinal.docx';
        $newSection = $phpWord->addSection();

        $section = $phpWord->addSection();
        $section->getStyle()->setBreakType('continuous');
        $header = $section->addHeader();
        $header->headerTop(10);

        $tableStyle = array('borderSize' => 1, 'borderColor' => '999999', 'afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0  );
        $styleCell = array('borderTopSize'=>1 ,'borderTopColor' =>'black','borderLeftSize'=>1,'borderLeftColor' =>'black','borderRightSize'=>1,'borderRightColor'=>'black','borderBottomSize' =>1,'borderBottomColor'=>'black' );
        $fontStyle = array('italic'=> true, 'size'=>10, 'name'=>'Arial','afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0 );
        $TfontStyle = array('bold'=>true, 'italic'=> true, 'size'=>10, 'name' => 'Arial', 'afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0);
        $cfontStyle = array('allCaps'=>true,'italic'=> true, 'size'=>10, 'name' => 'Arial','afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0);
        $noSpace = array('textBottomSpacing' => -1);
        $table = $section->addTable('myOwnTableStyle',array('borderSize' => 1, 'borderColor' => '999999', 'afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0  ));
       
        $table->addRow(-0.5, array('exactHeight' => -5));

        $table->addCell(2000,$styleCell)->addText('ImagenUPB',$TfontStyle);
        $table->addCell(5500,$styleCell)->addText('Informe auditoria <w:br/> GQ.PD.F. 08 <w:br/> AUDITORÍA INTERNA N° (I-2000)',$TfontStyle, ['align' => \PhpOffice\PhpWord\Style\Cell::VALIGN_CENTER ]);
        $table->addCell(3000, $styleCell)->addText('Pagina 1/11', $TfontStyle);
        
        $center = $phpWord->addParagraphStyle('p2Style', array('align'=>'center','marginTop' => 1));
        $section->addText(' ',$center);

        $table2 = $section->addTable('myOwnTableStyle',array('borderSize' => 1, 'borderColor' => '999999', 'afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>1  ));
        $table2->addRow(-0.5, array('exactHeight' => -5));
        $table2->addCell(1500,$styleCell)->addText(' PARA: ', $TfontStyle);
        $table2->addCell(5500,$styleCell)->addText(' Manuel Olave Ph.D');
        $table2->addRow();
        $table2->addCell(1500,$styleCell)->addText(' DE: ', $TfontStyle);
        $table2->addCell(5500,$styleCell)->addText(' Ing. Andrea Fernández Delgadillo');
        $table2->addRow();
        $table2->addCell(1500,$styleCell)->addText(' FECHA: ', $TfontStyle);
        $table2->addCell(5500,$styleCell)->addText(' de diciembre de 2016');

        $section->addText(' ',$center);
        $section->addText('1. Antecedentes',  $TfontStyle);
        $section->addText('Con la finalidad de determinar la conformidad del SGC de la UPB, verificar su eficacia y determinar el grado de atención a las observaciones de la auditoría externa, se llevó a cabo la 27va Auditoría Interna al Sistema de Gestión de Calidad de la UPB, los días 12 y 13 de agosto de 2016 en la ciudad de La Paz y los días 13, 14, 15 y 16 de agosto de 2016 en la ciudad de Cochabamba.', [ 'align' => \PhpOffice\PhpWord\Style\Alignment::ALIGN_BOTH]);



        $objectWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord,'Word2007');
        try {
            $objectWriter->save(storage_path($filename));
        } catch (Exception $e){}

        return response()->download(storage_path($filename));
    }
}
