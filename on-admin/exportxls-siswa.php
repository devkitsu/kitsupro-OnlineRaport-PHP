<?php

# MEMBUAT KONEKSI KE DATABASE
mysql_connect('localhost',"root",'');
mysql_select_db('smknbrondong');

# MENGAMBIL DATA DARI DATABASE MYSQL
$siswa = mysql_query("SELECT * FROM tb_siswa ORDER BY nama_siswa ASC");


/** Include PHPExcel */
require_once dirname(__FILE__) . '/PHPExcel/Classes/PHPExcel.php';

$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("SMK Negeri 1 Brondong")
->setLastModifiedBy("SMK Negeri 1 Brondong")
->setTitle("Data Siswa")
->setSubject("Data Siswa")
->setDescription("Data Siswa SMK Negeri 1 Brondong")
->setKeywords("SMK Negeri 1 Brondong")
->setCategory("Data Siswa");
// mulai dari baris ke 2
$row = 2;

// Tulis judul tabel
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A'.$row, 'NO')
->setCellValue('B'.$row, 'NIS/NISN')
->setCellValue('C'.$row, 'NAMA SISWA')
->setCellValue('D'.$row, 'JENIS KELAMIN')
->setCellValue('E'.$row, 'TEMPAT LAHIR')
->setCellValue('F'.$row, 'TANGGAL LAHIR')
->setCellValue('G'.$row, 'AGAMA')
->setCellValue('H'.$row, 'ALAMAT SISWA')
->setCellValue('I'.$row, 'TELP/HP SISWA')
->setCellValue('J'.$row, 'NAMA SEKOLAH ASAL')
->setCellValue('K'.$row, 'ALAMAT SEKOLAH ASAL')
->setCellValue('L'.$row, 'TAHUN IJAZAH')
->setCellValue('M'.$row, 'NOMOR IJAZAH')
->setCellValue('N'.$row, 'DITERIMA DI KELAS')
->setCellValue('O'.$row, 'TANGGAL DITERIMA')
->setCellValue('P'.$row, 'NAMA AYAH')
->setCellValue('Q'.$row, 'NAMA IBU')
->setCellValue('R'.$row, 'ALAMAT ORANGTUA')
->setCellValue('S'.$row, 'TELP/HP ORANGTUA')
->setCellValue('T'.$row, 'PEKERJAAN ORANGTUA')
->setCellValue('U'.$row, 'NAMA WALI')
->setCellValue('V'.$row, 'ALAMAT WALI')
->setCellValue('W'.$row, 'TELP/HP WALI')
->setCellValue('X'.$row, 'PEKERJAAN WALI')
->setCellValue('Y'.$row, 'FOTO');


$nomor  = 1; // set nomor urut = 1;

$row++; // pindah ke row bawahnya. (ke row 2)

// lakukan perulangan untuk menuliskan data siswa
while( $data = mysql_fetch_array($siswa)){
    $objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A'.$row,  $nomor )
    ->setCellValue('B'.$row, $data['nis_nisn'] )
    ->setCellValue('C'.$row, $data['nama_siswa'] )
    ->setCellValue('D'.$row, $data['jk'] )
    ->setCellValue('E'.$row, $data['tmp_lahir'] )
    ->setCellValue('F'.$row, $data['tgl_lahir'] )
    ->setCellValue('G'.$row, $data['agama'] )
    ->setCellValue('H'.$row, $data['alamat_siswa'] )
    ->setCellValue('I'.$row, $data['telp_hp_siswa'] )
    ->setCellValue('J'.$row, $data['nama_sek_asal'] )
    ->setCellValue('K'.$row, $data['alamat_sek_asal'] )
    ->setCellValue('L'.$row, $data['th_ijazah'] )
    ->setCellValue('M'.$row, $data['no_ijazah'] )
    ->setCellValue('N'.$row, $data['diterima_kelas'] )
    ->setCellValue('O'.$row, $data['tgl_diterima'] )
    ->setCellValue('P'.$row, $data['nama_ayah'] )
    ->setCellValue('Q'.$row, $data['nama_ibu'] )
    ->setCellValue('R'.$row, $data['alamat_ortu'] )
    ->setCellValue('S'.$row, $data['telp_hp_ortu'] )
    ->setCellValue('T'.$row, $data['pekerjaan_ortu'] )
    ->setCellValue('U'.$row, $data['nama_wali'] )
    ->setCellValue('V'.$row, $data['alamat_wali'] )
    ->setCellValue('W'.$row, $data['telp_hp_wali'] )
    ->setCellValue('X'.$row, $data['pekerjaan_wali'] )
    ->setCellValue('Y'.$row, $data['photo'] );

    $row++; // pindah ke row bawahnya ($row + 1)
    $nomor++;
}

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Siswa');

// Set sheet yang aktif adalah index pertama, jadi saat dibuka akan langsung fokus ke sheet pertama
$objPHPExcel->setActiveSheetIndex(0);

// Download (Excel2003)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="ExporDataSiswa.xls"');
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