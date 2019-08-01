<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Writer\Word2007;
class Word extends CI_Controller {
	public function html()
	{
		$name = basename(__FILE__, '.php');
		$source = base_url('vendor/contoh/index.html');
		$phpWord = \PhpOffice\PhpWord\IOFactory::load($source, 'HTML');

		$writer = new Word2007($phpWord);
				
			$filename = 'simple';
				
			header('Content-Type: application/msword');
			header('Content-Disposition: attachment;filename="'. $filename .'.docx"'); 
			header('Cache-Control: max-age=0');
				
			$writer->save('php://output');

	}
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
		$multipleTabsStyleName = 'multipleTab';
		$phpWord->addParagraphStyle(
			$multipleTabsStyleName,
			array(
				'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH,
				'tabs' => array(
					new \PhpOffice\PhpWord\Style\Tab('left', 550),
					new \PhpOffice\PhpWord\Style\Tab('center', 3200),
					new \PhpOffice\PhpWord\Style\Tab('right', 5300),
				),
			)
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
		$lineStyle = array('weight' => 0,5, 'width' => 450, 'height' => 0, 'color' => 'black');
		$section->addLine($lineStyle);
		$section->addText("\t" . "Bersama ini kami sampaikan hal sebagai berikut.",null, $multipleTabsStyleName);
		
				$writer = new Word2007($phpWord);
				
				$filename = 'simple';
				
				header('Content-Type: application/msword');
					header('Content-Disposition: attachment;filename="'. $filename .'.docx"'); 
				header('Cache-Control: max-age=0');
				
				$writer->save('php://output');


	}
}
