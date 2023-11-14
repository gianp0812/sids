<h1 class="h3 mb-3" align="center"><strong>Jurusan</strong></h1>

					<div class="row">
						<div class="col-12">
							<div class="card flex-fill">
								<div class="card-header">
									<a href="?page=tambahjurusan" class="btn btn-success btn-sm">Tambah Jurusan</a>
								</div>
								<div class="card-body">
									<table class="table table-bordered table-striped table-hover cell-border" id="jurusan">
										<thead align="center">
											<tr>
												<th>No</th>
												<th>Nama Jurusan</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
                                        <?php 
											$no = 1;
                                            $query = mysqli_query($koneksi, "SELECT*FROM jurusan");
                                            while ($data = mysqli_fetch_array($query)) {
                                        ?>
											<tr>
												<td><?php echo $no; ?></td>
												<td><?php echo $data['nama_jurusan']; ?></td>
												<td>
													<a href="?page=edit_jurusan&id=<?php echo $data['id_jurusan']; ?>" class="btn btn-warning btn-sm rounded"><i data-feather="edit"></i></a>
													<a href="?page=hapus_jurusan&id=<?php echo $data['id_jurusan']; ?>" class="btn btn-danger btn-sm rounded"><i data-feather="trash-2"></i></a>
												</td>
											</tr>
											<?php
											$no++;
                                            }
                                        ?>
										</tbody>                                        
									</table>
								</div>
							</div>
						</div>
					</div>

					<script>
						let table = new DataTable('#jurusan');
					</script>