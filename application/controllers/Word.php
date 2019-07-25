<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Writer\Word2007;
class Word extends CI_Controller {
	public function index()
	{

		$phpWord = new PhpWord();
		$title = 'rStyle';
		$phpWord->addFontStyle($title, array('bold' => true, 'italic' => false, 'size' => 11, 'font'=>'arial'));
		$paragraphStyleName = 'pStyle';
		$phpWord->addParagraphStyle($paragraphStyleName, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 100));
		$phpWord->addTitleStyle(1, array('bold' => true), array('spaceAfter' => 240));
		// New portrait section
		$section = $phpWord->addSection();
		// Simple text
		$section->addText('KEMENTERIAN HUKUM DAN HAK ASASI MANUSIA', $title, $paragraphStyleName);
		$section->addText('INSPEKTORAT JENDERAL', $title, $paragraphStyleName);
		$section->addTextBreak();
		$section->addText('NOTA DINAS', $fontStyleName, $paragraphStyleName);

		// Two text break
		$section->addTextBreak(2);
		// Define styles
		$section->addTextBreak();
				$writer = new Word2007($phpWord);
				
				$filename = 'simple';
				
				header('Content-Type: application/msword');
					header('Content-Disposition: attachment;filename="'. $filename .'.docx"'); 
				header('Cache-Control: max-age=0');
				
				$writer->save('php://output');


	}
}
