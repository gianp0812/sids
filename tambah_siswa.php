<?php
if (isset($_POST['nisn'])) {
    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];
    $nama_siswa = $_POST['nama_siswa'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $id_kelas = $_POST['id_kelas'];


    $cek = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn='$nisn'");
    $cek1 = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nis='$nis'");
    $cek2 = mysqli_num_rows($cek);
    $cek3 = mysqli_num_rows($cek1);
	
		$query = mysqli_query($koneksi, "INSERT INTO siswa (nisn,nis,nama_siswa,id_kelas,jenis_kelamin,tanggal_lahir,alamat) VALUES ('$nisn','$nis','$nama_siswa','$id_kelas','$jenis_kelamin','$tanggal_lahir','$alamat')");
        if ($query) {
            echo '<script>alert("Tambah Data Berhasil");location.href="?page=siswa";</script>';
        }
    }else{   
        echo '<script>alert("NISN Atau NIS Sudah Digunakan");</script>';
    }
 
?>


<h1 class="h3 mb-3" align="center"><strong>Tambah Siswa</strong></h1>

					<div class="row">
						<div class="col-12">
							<div class="card flex-fill">
								<div class="card-body">
									<form action="" method="post">
										<div class="mb-3">
											<label class="form-label">NISN</label>
											<div class="col-sm-12">
												<input type="text" name="nisn" class="form-control">
											</div>
										</div>
										<div class="mb-3">
											<label class="form-label">NIS</label>
											<div class="col-sm-12">
												<input type="text" name="nis" class="form-control">
											</div>
										</div>
										<div class="mb-3">
											<label class="form-label">Nama Siswa</label>
											<div class="col-sm-12">
												<input type="text" name="nama_siswa" class="form-control">
											</div>
										</div>
										<div class="mb-3">
											<label class="form-label">Kelas Dan Jurusan</label>
											<select name="id_kelas" class="form-select">
                                            <?php
                                                    $query = mysqli_query($koneksi, "SELECT * FROM kelas INNER JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan");
                                                    while ($kelas = mysqli_fetch_array($query)) {                         
                                                    ?>

                                                    <option value="<?php echo $kelas['id_kelas']; ?>"> <?php echo $kelas['nama_kelas']; echo " - " ; echo $kelas['nama_jurusan']; ?></option>
													
                                                    <?php
                                                    }
                                                    ?>
											</select>
										</div>
										<div class="mb-3">
											<label class="form-label">Tgl Lahir</label>
											<div class="col-sm-12">
												<input type="date" name="tanggal_lahir" class="form-control">
											</div>
										</div>
										<div class="mb-3">
											<label class="form-label">Jenis Kelamin</label>
											<div>
												<select name="jenis_kelamin" class="form-select">
													<option value="L">L</option>
													<option value="P">P</option>
												</select>
											</div>
										</div>
										<div class="mb-3">
											<label class="form-label">Alamat</label>
											<div class="col-sm-12">
												<input type="text" name="alamat" class="form-control">
											</div>
										</div>

										<div class="mb-3" style="float: right;">
											<button class="btn btn-primary">Simpan</button>
											<button typy="reset" class="btn btn-danger">Reset</button>
											<a href="siswa.html" class="btn btn-warning"> kembali</a>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>