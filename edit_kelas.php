<?php
$id = $_GET['id'];
if (isset($_POST['nama_kelas'])) {
    $nama_kelas = $_POST['nama_kelas'];
    $id_jurusan = $_POST['id_jurusan'];

    $query = mysqli_query($koneksi, "UPDATE kelas SET nama_kelas='$nama_kelas',id_jurusan='$id_jurusan' WHERE id_kelas='$id'");

    if ($query) {
        echo '<script>alert("Edit Data Berhasil");location.href="?page=kelas";</script>';
    }
}
    $query = mysqli_query($koneksi, "SELECT*FROM kelas WHERE id_kelas='$id'");
    $data = mysqli_fetch_array($query);
?>


<h1 class="h3 mb-3" align="center"><strong>Edit Kelas</strong></h1>

					<div class="row">
						<div class="col-12">
							<div class="card flex-fill">
								<div class="card-body">
									<form action="" method="post">
										<div class="mb-3">
											<label class="form-label">Nama Kelas</label>
											<div class="col-sm-12">
												<input type="text" name="nama_kelas" class="form-control" value="<?php echo $data['nama_kelas']; ?>">
											</div>
										</div>
										<div class="mb-3">
											<label class="form-label">Nama Jurusan</label>
											<div>
												<select name="id_jurusan" class="form-select">
                                                    <?php
                                                    $query = mysqli_query($koneksi, "SELECT * FROM jurusan");
                                                    while ($jurusan = mysqli_fetch_array($query)) {                         
                                                        ?>

                                                        <option value="<?php echo $jurusan['id_jurusan']; ?>" 
															<?php if ($data['id_jurusan'] == $jurusan['id_jurusan']) { 
                                                            echo 'selected'; 
                                                            } 
                                                            ?>> 
                                                            <?php echo $jurusan['nama_jurusan']; ?>
                                                        </option>

                                                        <?php
                                                    }
                                                    ?>
												</select>
											</div>
										</div>

										<div class="mb-3" style="float: right;">
											<button class="btn btn-primary">Simpan</button>
											<button typy="reset" class="btn btn-danger">Reset</button>
											<a href="?page=kelas" class="btn btn-warning"> kembali</a>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>