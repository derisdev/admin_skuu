<?php
require_once "config/database.php";

if (isset($_POST['simpan'])) {
	if (isset($_POST['nim'])) {
		$nim           = $_POST['nim'];
		$tempat_lahir  = $_POST['tempat_lahir'];
	
		$tanggal       = $_POST['tanggal_lahir'];
		$tgl           = explode('-',$tanggal);
		$tanggal_lahir = $tgl[2]."-".$tgl[1]."-".$tgl[0];
	
		$jenis_kelamin = $_POST['jenis_kelamin'];
		$agama         = $_POST['agama'];
		$alamat        = $_POST['alamat'];
		$no_telepon    = $_POST['no_telepon'];

		$query =  $session->execute("UPDATE data_mahasiswa SET nama 	= '".$_POST["nama"]."',
												  tempat_lahir 	= '$tempat_lahir',
												  tanggal_lahir = '$tanggal_lahir',
												  jenis_kelamin = '$jenis_kelamin',
												  agama 		= '$agama',
												  alamat 		= '$alamat',
												  no_telepon 	= '$no_telepon'
										    WHERE nim 			= '$nim'");		

		if ($query) {
			header('location: index.php?alert=3');
		} else {
			header('location: index.php?alert=1');
		}				
	}
}		
?>