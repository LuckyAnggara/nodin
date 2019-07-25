<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Writer\Word2007;
class Word extends CI_Controller {
	public function index()
	{

$phpWord = new \PhpOffice\PhpWord\PhpWord();
// New portrait section
$section = $phpWord->addSection();
// Add first page header
$header = $section->addHeader();
$header->firstPage();
$table = $header->addTable();
$table->addRow();
$cell = $table->addCell(4500);
$textrun = $cell->addTextRun();
$textrun->addText('This is the header with ');
$textrun->addLink('https://github.com/PHPOffice/PHPWord', 'PHPWord on GitHub');
$table->addCell(4500)->addImage('assets\images\logo kemenkumham.png', array('width' => 80, 'height' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::END));
// Add header for all other pages
$subsequent = $section->addHeader();
$subsequent->addText('Subsequent pages in Section 1 will Have this!');
$subsequent->addImage('assets\images\logo kemenkumham.png', array('width' => 80, 'height' => 80));

// Write some text
$section->addTextBreak();
$section->addText('Sunt sunt irure ad adipisicing mollit. Fugiat dolore ut in cillum proident sunt commodo velit voluptate dolore consequat. Id officia minim amet sunt deserunt ad deserunt dolor ullamco irure amet eiusmod elit. Magna nulla duis culpa ipsum in.

Incididunt qui consequat aliqua Lorem veniam incididunt cillum ea nisi eu. Labore anim exercitation laboris sit sit exercitation ex enim cupidatat nostrud ad occaecat. In voluptate id do id aute et dolor dolore cupidatat ad ut laboris. Culpa deserunt ut Lorem cupidatat amet.');
// Save file
$writer = new Word2007($phpWord);
		
		$filename = 'simple';
		
		header('Content-Type: application/msword');
        	header('Content-Disposition: attachment;filename="'. $filename .'.docx"'); 
		header('Cache-Control: max-age=0');
		
		$writer->save('php://output');


	}
}
