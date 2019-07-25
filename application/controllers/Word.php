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
		$section->addText('Nomor : ITJ.1.UM.01.01-XXXX/VII/2019 ', $nodinStyle, $paragraphStyleName);
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
		$section->addTextBreak(1);
		$section->addText('Aliquip amet cupidatat reprehenderit proident. Non quis mollit amet ea ut ea eiusmod. Labore laborum dolor nisi deserunt anim reprehenderit esse ipsum cupidatat. Velit minim dolore adipisicing eu velit adipisicing. Commodo dolore amet qui et ipsum mollit irure.

		Ea consequat ea deserunt quis occaecat sunt est ea pariatur ullamco mollit occaecat id proident. Duis nostrud laboris proident id laborum fugiat aliquip sit Lorem voluptate. Exercitation esse incididunt occaecat pariatur. Sint fugiat eiusmod do reprehenderit non qui dolore nulla eiusmod. Veniam labore nulla eiusmod ex consectetur occaecat aliquip ea id quis aliqua non id excepteur.

		Consequat eu duis sint qui dolor voluptate cillum ut laborum esse exercitation consectetur. Nostrud sint cupidatat consequat ipsum voluptate cillum. Proident labore elit culpa labore nostrud irure ipsum deserunt qui. Veniam Lorem ea non occaecat exercitation incididunt aliquip culpa ullamco culpa ullamco pariatur consequat velit. Ipsum sunt ex tempor magna in consequat minim nisi in. Laboris excepteur dolor magna tempor consequat.');
		
				$writer = new Word2007($phpWord);
				
				$filename = 'simple';
				
				header('Content-Type: application/msword');
					header('Content-Disposition: attachment;filename="'. $filename .'.docx"'); 
				header('Cache-Control: max-age=0');
				
				$writer->save('php://output');


	}
}
