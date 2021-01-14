
<?php
require_once "config/database.php";

if (isset($_POST['simpan'])) {
	$nim           = (int) $_POST['nim'];
	$nama          = $_POST['nama'];
	$tempat_lahir  = $_POST['tempat_lahir'];

	$tanggal       = $_POST['tanggal_lahir'];
	$tgl           = explode('-',$tanggal);
	$tanggal_lahir = $tgl[2]."-".$tgl[1]."-".$tgl[0];

	$jenis_kelamin = $_POST['jenis_kelamin'];
	$agama         = $_POST['agama'];
	$alamat        = $_POST['alamat'];
	$no_telepon    = $_POST['no_telepon'];

	$query = $session->execute("INSERT INTO data_mahasiswa(nim,
	nama,
   tempat_lahir,
   tanggal_lahir,
   jenis_kelamin,
   agama,
   alamat,
   no_telepon)	
VALUES('$nim',
   '$nama',
   '$tempat_lahir',
   '$tanggal_lahir',
   '$jenis_kelamin',
   '$agama',
   '$alamat',
   '$no_telepon')");		

	if ($query) {
		header('location: index.php?alert=2');
	} else {
		header('location: index.php?alert=1');
	}						
}
?>