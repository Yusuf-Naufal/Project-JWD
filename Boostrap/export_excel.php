<?php
require 'vendor/autoload.php';
include_once 'koneksi.php';
include_once 'model.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;


$model = new Model($koneksi);
//SELECT * FORM peserta
$data = $model->TampilSemua();

$spreadsheet = new Spreadsheet();

$spreadsheet->getProperties()
->setCreator('Yusuf Naufal Zuhdi')
->setLastModifiedBy('Yusuf Naufal Zuhdi')
->setTitle('Laporan Peserta Vaksin')
->setSubject('Laporan Peserta Vaksin')
->setDescription('Laporan Peserta Vaksin')
->setKeywords('Laporan Peserta Vaksin')
->setCategory('Laporan Peserta Vaksini');

//MEMBUAT JUDUL PADA EXCEL
$spreadsheet->getActiveSheet()->mergeCells('A1:J1'); //MENGGABUNGKAN CELL DARI A1 - J1
$spreadsheet->getActiveSheet()->setCellValue('A1', 'Laporan Peserta Vaksin Kota Cilacap Tahun 2020');

//MEMBERI HEADER PADA EXEL 
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A3', 'No');
$sheet->setCellValue('B3', 'Nama');
$sheet->setCellValue('C3', 'NIK');
$sheet->setCellValue('D3', 'Umur');
$sheet->setCellValue('E3', 'Jenis Kelamin');
$sheet->setCellValue('F3', 'Riwayat Penyakit');
$sheet->setCellValue('G3', 'Tanggal');
$sheet->setCellValue('H3', 'Jenis Vaksin');
$sheet->setCellValue('I3', 'Biaya');
$sheet->setCellValue('J3', 'Bukti');


//MEMASUKKAN SEMUA DATA KE CELL
$no = 1;
$row = 4;
foreach ($data as $x) {
    $sheet->setCellValue('A' . $row, $no++);
    $sheet->setCellValue('B' . $row, $x['nama']);
    $sheet->setCellValue('C' . $row, $x['nik']);
    $sheet->setCellValue('D' . $row, $x['umur']);
    $sheet->setCellValue('E' . $row, $x['jenis_kelamin']);
    $sheet->setCellValue('F' . $row, $x['riwayat_penyakit']);
    $sheet->setCellValue('G' . $row, $x['tanggal']);
    $sheet->setCellValue('H' . $row, $x['jenis_vaksin']);
    $sheet->setCellValue('I' . $row, $x['biaya']);
    $sheet->setCellValue('J' . $row, $x['bukti']);
    $row++;
}

$writer = new Xlsx($spreadsheet);
$filename = 'data_peserta_vaksin.xlsx';

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
exit;
?>
