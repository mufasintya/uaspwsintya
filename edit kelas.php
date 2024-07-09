<?php include('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>CONTOH CRUD MySQLi</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="#">CONTOH CRUD MySQLi</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" kode_mk="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="tambah.php">Tambah Mahasiswa</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="tambah dosen.php">Tambah Dosen</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="tambah makul.php">Tambah Makul</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="tambah kelas.php">Tambah Kelas</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="tambah biodata.php">Biodata Diri</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	
	<div class="container" style="margin-top:20px">
		<h2>Edit Kelas</h2>
		
		<hr>
		
		<?php
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			
			$select = mysqli_query($koneksi, "SELECT * FROM kelas WHERE id='$id'") or die(mysqli_error($koneksi));
			
			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">Kode makul tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>
		
		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$kode_kelas			= $_POST['kode_kelas'];
			$makul			    = $_POST['makul'];
			$kode_dosen			= $_POST['kode_dosen'];
			$jam			    = $_POST['jam'];
						
			$sql = mysqli_query($koneksi, "UPDATE kelas SET kode_kelas='$kode_kelas', makul='$makul', kode_dosen='$kode_dosen', jam='$jam' WHERE id='$id'") or die(mysqli_error($koneksi));
			
			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="edit kelas.php?id='.$id.'";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>
		
		<form action="edit kelas.php?id=<?php echo $id; ?>" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">KODE KELAS</label>
				<div class="col-sm-10">
                <input type="text" name="kode_kelas" class="form-control" value="<?php echo $data['kode_kelas']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NAMA MAKUL</label>
				<div class="col-sm-10">
                <input type="text" name="makul" class="form-control" value="<?php echo $data['makul']; ?>" required>
				</div>
			</div>
			
			<div class="form-group row">
                <label class="col-sm-2 col-form-label">KODE DOSEN</label>
				<div class="col-sm-10">
                    <input type="text" name="kode_dosen" class="form-control" value="<?php echo $data['kode_dosen']; ?>" required>
				</div>
			</div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">JAM</label>
                <div class="col-sm-10">
                    <select name="jam" class="form-control" required>
                        <option value="">PILIH JAM</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
                    </select>
                </div>
            </div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
					<a href="index.php" class="btn btn-warning">KEMBALI</a>
				</div>
			</div>
		</form>
		
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</body>
</html>