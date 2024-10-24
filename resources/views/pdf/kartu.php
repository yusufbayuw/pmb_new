<?php
error_reporting(0);
// $qunit=isset($_POST['id_daftar']) ? $_POST['id_daftar'] : "";
//  if($qunit=="") { exit; }

require("fpdf/fpdf.php");
include "lib/fungsi.php";
include_once "phpqrcode/qrlib.php";


$id_daftar	= isset($_GET['id']) ? $_GET['id'] : "";
$q_data_edit	= mysqli_query($koneksi,"SELECT * FROM master WHERE id_daftar = '$id_daftar'");
$a_data	= mysqli_fetch_array($q_data_edit);
$p_registrasi		= $a_data[52];
if($p_registrasi=="") { echo "<h4 class='alert_error'>Data Peserta Belum Di Verifikasi <span id='close'>[<a href='#'>X</a>]</span></h4>";exit; }
$tgl = substr($a_data[46],8,2)."-".substr($a_data[46],5,2)."-".substr($a_data[46],0,4);
$tgllahir = substr($a_data[5],8,2)."-".substr($a_data[5],5,2)."-".substr($a_data[5],0,4);
$nmunit=getunit($a_data[51]);
if ($a_data[2] == 1) { 
    $jkel= "Laki-Laki"; }
else if ($a_data[2] == 2) { 
    $jkel= "Perempuan"; } 
else {	
    $jkel= "-";	}
	
//QRCODE
$qrkode = "qrtemp/".$id_daftar.".png";
$p=hex($a_data[49],"32"); 
$link = $qrlink."umum/loginAksi.php?q=1&pid=$a_data[48]&pip=$p";
QRcode::png("$link", "$qrkode", "M", 2, 2);

//---------

$tglahir = substr($a_data[5],8,2)."-".substr($a_data[5],5,2)."-".substr($a_data[5],0,4);
$ttl = $a_data[4].", ".$tglahir;
$jk = getJK($a_data[2]);
$tanggal = date("d-m-Y");
$unit = "#".getunit($a_data[51])."#";
$nama = $a_data[1];
$alamat = $a_data[6];
$noreg = $a_data[52]; //$a_data[55];
$asal = $a_data[18];
if($a_data[54]!=NULL) {
   $photo="umum/photo/".$a_data[54]; }
else {
   $photo="umum/photo/images.jpg"; }

if($a_data[51]!="5") { 
   $imgltr = "images/backkartu.jpg"; }
else {
   $imgltr = "images/backkartu_asmtb.jpg"; }

if($a_data[51] == 5) {
   $nomor = "93 , 95"; }
else {
 if($a_data[51] == 1) {
    $nomor = "91"; }
 else {
    $nomor = "52"; } }
    	
if($a_data[51] != 5 ) {
   $ket = "Peserta Didik"; }
else {
    $ket = "Mahasiswa"; }
$t_unit = strtoupper(getunit($a_data[51]));
$baris1 = 35;
$baris2 = 40;
$baris3 = 50;
$len = strlen($nama);
if($len <=25) {
$baris1 = 30;
$baris2 = 35;
$baris3 = 45; }


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetX(5);
$pdf->Image($imgltr,5,5,98);
$pdf->SetTextColor(255,255,255);
$pdf->SetY(6);
$pdf->SetX(18);
$pdf->SetFont('Arial','B',8);
if(($a_data[51] > 0) and ($a_data[51] < 3))  {
    $pdf->Cell(77,5,'KARTU PENDAFTARAN '.strtoupper($ket),0,1,'C'); }
else {
    $pdf->Cell(77,5,'KARTU PENDAFTARAN CALON '.strtoupper($ket),0,1,'C'); }

//$pdf->Cell(77,5,'KARTU PENDAFTARAN CALON '.strtoupper($ket),0,1,'C');
$pdf->SetY(10);
$pdf->SetX(18);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(77,5,$t_unit,0,1,'C');
$pdf->SetY(13.5);
$pdf->SetX(18);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(77,5,'Jln. L.L.R.E. Martadinata No. '.$nomor.' Bandung Jawa Barat Indonesia',0,1,'C');


$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','B',7.5);
$pdf->SetXY(8,20);
$pdf->Cell(30,5,'No. Peserta',0,1,'L');
$pdf->SetXY(8,25);
$pdf->MultiCell(20,5,'Nama Peserta ',0,'L',false);
$pdf->SetXY(8,$baris1);
$pdf->Cell(30,5,'Tempat, Tgl Lahir',0,1,'L');
//$pdf->SetXY(8,35);
//$pdf->Cell(30,5,'Jenis Kelamin',0,1,'L');
$pdf->SetXY(8,$baris2);
$pdf->Cell(30,5,'Alamat Rumah',0,1,'L');
$pdf->SetXY(8,$baris3);
$pdf->Cell(30,5,'Asal Sekolah',0,1,'L');

$pdf->SetFont('Arial','',7);
$pdf->SetXY(75,55);
$pdf->Cell(30,5,'Bandung, ',0,1,'L');
$pdf->SetXY(75,64);
$pdf->Cell(30,5.5,'Panitia PPDB/PMB',0,1,'L');

$pdf->Image($qrkode,9,54.5,14,14);

$pdf->SetFont('Arial','',5);
$pdf->SetXY(23,59);
$pdf->Cell(30,5,'CATATAN :',0,1,'L');
$pdf->SetXY(23,63);
$pdf->MultiCell(45,3,'Kartu ini harap dibawa selama proses PPDB/PMB Taruna Bakti Bandung Tahun Ajaran '.$tajarans,0,'L',false);

//------data

$pdf->Rect(78.3, 23.4, 20, 28, 1);
$pdf->Image($photo,78.7,23.9,19.1,27);

$pdf->SetFont('Arial','B',7.5);
$pdf->SetXY(31,20);
$pdf->MultiCell(50,5,":",0,'L',false);
$pdf->SetXY(31,25);
$pdf->MultiCell(50,5,":",0,'L',false);
$pdf->SetXY(31,$baris1);
$pdf->MultiCell(50,5,":",0,'L',false);
$pdf->SetXY(31,$baris2);
$pdf->MultiCell(50,5,":",0,'L',false);
$pdf->SetXY(31,$baris3);
$pdf->MultiCell(50,5,":",0,'L',false);
//$pdf->SetTextColor(255,255,255);
//$pdf->SetXY(67,20);
//$pdf->Cell(39,5,$unit,0,1,'C');
$pdf->SetFont('Arial','',7.5);
//$pdf->SetTextColor(0,0,0);
$pdf->SetXY(32.5,20);
$pdf->Cell(30,5,$noreg,0,1,'L');
$pdf->SetXY(32.5,25);
$pdf->MultiCell(45,5,$nama,0,'L',false);
$pdf->SetXY(32.5,$baris1);
$pdf->Cell(30,5,$ttl,0,1,'L');
//$pdf->SetXY(31,35);
//$pdf->MultiCell(50,5,":",0,'L',false);
$pdf->SetXY(32.5,$baris2);
$pdf->MultiCell(45,5,$alamat,0,'L',false);
$pdf->SetXY(32.5,$baris3);
$pdf->MultiCell(45,5,$asal,0,'L',false);
$pdf->SetXY(87,55);
$pdf->SetFont('Arial','',7);
$pdf->Cell(15,5,$tanggal,0,1,'L');

//$pdf->SetFont('Arial','B',6);
//$pdf->SetXY(78.3,50);
//$pdf->Cell(20,3,$jk,1,1,'C');


$pdf->Output("Kartu-".$noreg.".pdf",'I');


// Hapus QRCODE

  $filedel="qrtemp/".$id_daftar.".png";
  if (file_exists($filedel)) {
    unlink("$filedel");}

?>
				
