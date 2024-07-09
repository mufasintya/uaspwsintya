<?php
//include file config.php
include('config.php');

if(isset($_GET['nim'])){
	$nim = $_GET['nim'];
	
	$cek = mysqli_query($koneksi, "SELECT * FROM biodata WHERE nim='$nim'") or die(mysqli_error($koneksi));
	
	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if(mysqli_num_rows($cek) > 0){
		$del = mysqli_query($koneksi, "DELETE FROM biodata WHERE nim='$nim'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="index.php";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="index.php";</script>';
		}
	}else{
		echo '<script>alert("nim tidak ditemukan di database."); document.location="index.php";</script>';
	}
}else{
	echo '<script>alert("nim tidak ditemukan di database."); document.location="index.php";</script>';
}

?>