<?php

# MEMBUAT KONEKSI KE DATABASE
mysql_connect('localhost',"root",'');
mysql_select_db('smknbrondong');

# MENGAMBIL DATA DARI DATABASE MYSQL
$siswa = mysql_query("SELECT * FROM tb_guru ORDER BY nip ASC");


/** Include PHPExcel */
require_once dirname(__FILE__) . '/PHPExcel/Classes/PHPExcel.php';

$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("SMK Negeri 1 Brondong")
->setLastModifiedBy("SMK Negeri 1 Brondong")
->setTitle("Data Guru")
->setSubject("Data Guru")
->setDescription("Data Guru SMK Negeri 1 Brondong")
->setKeywords("SMK Negeri 1 Brondong")
->setCategory("Data Guru");
// mulai dari baris ke 2
$row = 2;

// Tulis judul tabel
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A'.$row, 'NO')
->setCellValue('B'.$row, 'NIP')
->setCellValue('C'.$row, 'NUPTK')
->setCellValue('D'.$row, 'NAMA')
->setCellValue('E'.$row, 'TEMPAT LAHIR')
->setCellValue('F'.$row, 'TANGGAL LAHIR')
->setCellValue('G'.$row, 'JENIS KELAMIN')
->setCellValue('H'.$row, 'AGAMA')
->setCellValue('I'.$row, 'ALAMAT')
->setCellValue('J'.$row, 'NO TELP/HP')
->setCellValue('K'.$row, 'STATUS')
->setCellValue('L'.$row, 'JENIS PTK');

$nomor  = 1; // set nomor urut = 1;

$row++; // pindah ke row bawahnya. (ke row 2)

// lakukan perulangan untuk menuliskan data siswa
while( $data = mysql_fetch_array($siswa)){
    $objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A'.$row,  $nomor )
    ->setCellValue('B'.$row, $data['nip'] )
    ->setCellValue('C'.$row, $data['nuptk'] )
    ->setCellValue('D'.$row, $data['nama_guru'] )
    ->setCellValue('E'.$row, $data['tmp_lahir'] )
    ->setCellValue('F'.$row, $data['tgl_lahir'] )
    ->setCellValue('G'.$row, $data['jk'] )
    ->setCellValue('H'.$row, $data['agama'] )
    ->setCellValue('I'.$row, $data['alamat'] )
    ->setCellValue('J'.$row, $data['telp_hp'] )
    ->setCellValue('K'.$row, $data['status'] )
    ->setCellValue('L'.$row, $data['jenis_ptk'] );

    $row++; // pindah ke row bawahnya ($row + 1)
    $nomor++;
}

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Siswa');

// Set sheet yang aktif adalah index pertama, jadi saat dibuka akan langsung fokus ke sheet pertama
$objPHPExcel->setActiveSheetIndex(0);

// Download (Excel2003)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="ExporDataGuru.xls"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');
// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5'); 

$objWriter->save('php://output');
exit;

?>