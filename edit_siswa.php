<?php
$id = $_GET['id'];
if (isset($_POST['nisn'])) {
    $nisn_old = $_POST['nisn_old'];
    $nis_old = $_POST['nis_old'];
    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];
    $nama_siswa = $_POST['nama_siswa'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $id_kelas = $_POST['id_kelas'];
    
    $cek_nisn = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn!='$nisn_old' AND nisn='$nisn'");
    $cek_nis = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nis!='$nis_old' AND nis='$nis'");
    $cek1 = mysqli_num_rows($cek_nisn);
    $cek2 = mysqli_num_rows($cek_nis);

    if ($cek1 == 0 && $cek2 == 0) {
        $query = mysqli_query($koneksi, "UPDATE siswa SET nisn='$nisn',nis='$nis',nama_siswa='$nama_siswa',id_kelas='$id_kelas',jenis_kelamin='$jenis_kelamin',tanggal_lahir='$tanggal_lahir',alamat='$alamat' WHERE nisn='$id'");
        if ($query) {
            echo '<script>alert("Edit Data Berhasil");location.href="?page=siswa";</script>';
        }
    }elseif($cek1 != 0){   
        echo '<script>alert("NISN Sudah Digunakan");</script>';
    }elseif ($cek2 != 0) {
		echo '<script>alert("NIS Sudah Digunakan");</script>';
	}
    
    
}

    $query = mysqli_query($koneksi, "SELECT*FROM siswa WHERE nisn='$id'");
    $data = mysqli_fetch_array($query); 

?>


<h1 class="h3 mb-3" align="center"><strong>Edit Siswa</strong></h1>

					<div class="row">
						<div class="col-12">
							<div class="card flex-fill">
								<div class="card-body">
									<form action="" method="post">
										<div class="mb-3">
											<label class="form-label">NISN</label>
											<div class="col-sm-12">
												<input type="hidden" name="nisn_old" class="form-control" value="<?php echo $data['nisn']; ?>">
												<input type="text" name="nisn" class="form-control" value="<?php echo $data['nisn']; ?>">
											</div>
										</div>
										<div class="mb-3">
											<label class="form-label">NIS</label>
											<div class="col-sm-12">
												<input type="hidden" name="nis_old" class="form-control" value="<?php echo $data['nis']; ?>">												
												<input type="text" name="nis" class="form-control" value="<?php echo $data['nis']; ?>">
											</div>
										</div>
										<div class="mb-3">
											<label class="form-label">Nama Siswa</label>
											<div class="col-sm-12">
												<input type="text" name="nama_siswa" class="form-control" value="<?php echo $data['nama_siswa']; ?>">
											</div>
										</div>
										<div class="mb-3">
											<label class="form-label">Kelas Dan Jurusan</label>
											<select name="id_kelas" class="form-select">
                                            <?php
                                                    $query = mysqli_query($koneksi, "SELECT * FROM kelas INNER JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan");
                                                    while ($kelas = mysqli_fetch_array($query)) {                         
                                                    ?>

                                                    <option value="<?php echo $kelas['id_kelas']; ?>" <?php if ($data['id_kelas'] == $kelas['id_kelas']) { 
                                                            echo 'selected'; 
                                                            } 
                                                            ?>> 
                                                            <?php echo $kelas['nama_kelas']; echo " - " ; echo $kelas['nama_jurusan']; ?></option>
													
                                                    <?php
                                                    }
                                                    ?>
											</select>
										</div>
										<div class="mb-3">
											<label class="form-label">Tgl Lahir</label>
											<div class="col-sm-12">
												<input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $data['tanggal_lahir']; ?>">
											</div>
										</div>
										<div class="mb-3">
											<label class="form-label">Jenis Kelamin</label>
											<div>
												<select name="jenis_kelamin" class="form-select">
													<option hidden><?php echo $data['jenis_kelamin']; ?></option>
													<option>L</option>
													<option>P</option>
												</select>
											</div>
										</div>
										<div class="mb-3">
											<label class="form-label">Alamat</label>
											<div class="col-sm-12">
												<input type="text" name="alamat" class="form-control" value="<?php echo $data['alamat']; ?>">
											</div>
										</div>

										<div class="mb-3" style="float: right;">
											<button class="btn btn-primary">Simpan</button>
											<button type="reset" class="btn btn-danger">Reset</button>
											<a href="?page=siswa" class="btn btn-warning"> kembali</a>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>