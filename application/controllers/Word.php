<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Writer\Word2007;
class Word extends CI_Controller {
	public function index()
	{

		$phpWord = new PhpWord();
		$title = 'titleStyle';
		$phpWord->addFontStyle($title, array('bold' => true, 
											'italic' => false, 
											'size' => 11, 
											'font'=>'arial',
											)
										);
										
		$tableHeader = 'tabelHeader';
		$phpWord->addFontStyle($tableHeader, array(
											 
											'size' => 11, 
											'font'=>'arial',
											)
										);
										
		$nodinStyle = 'nodinStyle';									
		$phpWord->addFontStyle($nodinStyle, array(
											'size' => 11, 
											'font'=>'arial'));
		$paragraphStyleName = 'pStyle';
		$phpWord->addParagraphStyle($paragraphStyleName, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 
																'spacing'=> 1,25,
																'spaceAfter' => 0)
															);
		$paragraphTable = 'tabelParagraph';
		$phpWord->addParagraphStyle($paragraphTable, array( 
																'spacing'=> 1,25,
																'spaceAfter' => 0)
															);
		
		
		$section = $phpWord->addSection();
		// Simple text
		$section->addText('KEMENTERIAN HUKUM DAN HAK ASASI MANUSIA', $title, $paragraphStyleName);
		$section->addText('INSPEKTORAT JENDERAL', $title, $paragraphStyleName);
		$section->addTextBreak(null,$nodinStyle, $paragraphStyleName);
		$section->addText('NOTA DINAS', $nodinStyle, $paragraphStyleName);
		$section->addText('NOMOR : ITJ.1.UM.01.01-XXXX/VII/2019 ', $nodinStyle, $paragraphStyleName);
		$section->addTextBreak(1);
		$table = $section->addTable();
		$table->addRow();
		$table->addCell(2500)->addText("Yth.",$tableHeader, $paragraphTable);
		$table->addCell(200)->addText(":",$tableHeader, $paragraphTable);
		$table->addCell(7300)->addText("",$tableHeader, $paragraphTable);
		$table->addRow();
		$table->addCell(2500)->addText("Dari",$tableHeader, $paragraphTable);
		$table->addCell(200)->addText(":",$tableHeader, $paragraphTable);
		$table->addCell(7300)->addText("",$tableHeader, $paragraphTable);
		$table->addRow();
		$table->addCell(2500)->addText("Hal",$tableHeader, $paragraphTable);
		$table->addCell(200)->addText(":",$tableHeader, $paragraphTable);
		$table->addCell(7300)->addText("",$tableHeader, $paragraphTable);
		$table->addRow();
		$table->addCell(2500)->addText("Lampiran",$tableHeader, $paragraphTable);
		$table->addCell(200)->addText(":",$tableHeader, $paragraphTable);
		$table->addCell(7300)->addText("",$tableHeader, $paragraphTable);
		$table->addRow();
		$table->addCell(2500)->addText("Tanggal",$tableHeader, $paragraphTable);
		$table->addCell(200)->addText(":",$tableHeader, $paragraphTable);
		$table->addCell(7300)->addText("",$tableHeader, $paragraphTable);
		
				$writer = new Word2007($phpWord);
				
				$filename = 'simple';
				
				header('Content-Type: application/msword');
					header('Content-Disposition: attachment;filename="'. $filename .'.docx"'); 
				header('Cache-Control: max-age=0');
				
				$writer->save('php://output');


	}
}
