<div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">View</a></li>
                                            <li class="breadcrumb-item active">Product</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Manage Product</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
								<p><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal_add_pengguna"><span class="fa fa-plus"></span> Tambah Produk</a></p>
									<br>
                                    <h4 class="header-title">Data Product</h4>
                                    <p class="sub-header">
									<?php echo $this->session->flashdata('msg');?>
                                         </p>

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>Preview</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Stock</th>
                                            <th>Category</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>


                                        <tbody>
										<?php 
											foreach ($data->result_array() as $a) {
												$id=$a['produk_id'];
												$nama=$a['produk_nama'];	
												$deskripsi=$a['produk_deskripsi'];
												$harga_lama=$a['produk_harga_lama'];
												$harga_baru=$a['produk_harga_baru'];
												$stok=$a['stok'];
												$kat_id=$a['produk_kategori_id'];
												$kat_nama=$a['produk_kategori_nama'];
												$gambar=$a['produk_gambar'];
											
										?>
											<tr>
												<td><img style="width:80px;height:80px;" class="img-thumbnail width-1" src="<?php echo base_url().'assets/gambar/'.$gambar;?>" alt="" /></td>
												<td><?php echo $nama;?></td>
												<td><?php echo substr($deskripsi,0,25).'...';?></td>
												<?php if(empty($harga_lama)):?>
													<td style="text-align:right;"><?php echo 'Rp '.number_format($harga_baru);?></td>
												<?php else:?>
													<td style="vertical-align:middle;text-align:right;"><b><?php echo 'Rp '.number_format($harga_baru);?></b><p style="font-size:9px;"><del><?php echo 'Rp '.number_format($harga_lama);?></del></p></td>
												<?php endif;?>
												<td style="text-align:center;"><?php echo $stok;?></td>
												<td style="text-align:center;"><?php echo $kat_nama;?></td>
												<td class="text-center">
													<a href="#" title="Edit row" data-toggle="modal" data-target="#modal_edit_pengguna<?php echo $id;?>"><i class="fa fa-edit"></i></a>
													<a href="#" title="Delete row" data-toggle="modal" data-target="#modal_hapus_pengguna<?php echo $id;?>"><i class="fa fa-trash"></i></a>
												</td>
											</tr>

										<?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- end row -->

                        
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->

			<!-- ============ MODAL ADD PELANGGAN =============== -->
			<div class="modal fade" id="modal_add_pengguna" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header">
				<h3 class="modal-title" id="myModalLabel">Tambah Produk</h3>
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			        
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'admin/produk/simpan_produk'?>" enctype="multipart/form-data">
			        <div class="modal-body">
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Nama</label>
										<div class="col-sm-12">
											<input type="text" name="nama" class="form-control" id="regular13" required>
										</div>
									</div>

									<div class="form-group">
										<label for="textarea13" class="col-sm-3 control-label">Deskripsi</label>
										<div class="col-sm-12">
											<textarea name="deskripsi" id="textarea13" class="form-control" rows="3" placeholder="" required></textarea>
										</div>
									</div>

									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Harga</label>
										<div class="col-sm-12">
											<input type="text" name="harga" class="form-control" id="regular13" required>
										</div>
									</div>

									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Stok</label>
										<div class="col-sm-12">
											<input type="text" name="stok" class="form-control" id="regular13" required>
										</div>
									</div>
									<div class="form-group">
										<label for="select13" class="col-sm-3 control-label">Kategori</label>
										<div class="col-sm-12">
											<select id="select13" name="kategori" class="form-control" required>
												<option value="">&nbsp;</option>
												<?php 
													foreach ($kat->result_array() as $k) {
														$k_id=$k['kategori_id'];
														$k_nama=$k['kategori_nama'];
													
												?>
												<option value="<?php echo $k_id;?>"><?php echo $k_nama;?></option>
												<?php } ?>	
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Gambar</label>
										<div class="col-sm-12">
											<input type="file" name="filefoto" class="form-control" id="regular13" required>
										</div>
									</div>
									
			        </div>
			        <div class="modal-footer">
			            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
			            <button class="btn btn-primary" type="submit"><span class="fa fa-save"></span> Simpan</button>
			        </div>
			    </form>
			    </div>
			    </div>
			</div>

			<!-- ============ MODAL EDIT PENGGUNA =============== -->
			<?php 
				foreach ($data->result_array() as $a) {
					$id=$a['produk_id'];
					$nama=$a['produk_nama'];	
					$deskripsi=$a['produk_deskripsi'];
					$harga_lama=$a['produk_harga_lama'];
					$harga_baru=$a['produk_harga_baru'];
					$stok=$a['stok'];
					$kat_id=$a['produk_kategori_id'];
					$kat_nama=$a['produk_kategori_nama'];
					$gambar=$a['produk_gambar'];
								
			?>
			<div class="modal fade" id="modal_edit_pengguna<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header">
				<h3 class="modal-title" id="myModalLabel">Edit Produk</h3>
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			        
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'admin/produk/update_produk'?>" enctype="multipart/form-data">
			        <div class="modal-body">
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Nama</label>
										<div class="col-sm-12">
											<input type="hidden" name="kode" value="<?php echo $id;?>">
											<input type="text" name="nama" value="<?php echo $nama;?>" class="form-control" id="regular13" required>
										</div>
									</div>

									<div class="form-group">
										<label for="textarea13" class="col-sm-3 control-label">Deskripsi</label>
										<div class="col-sm-12">
											<textarea name="deskripsi" id="textarea13" class="form-control" rows="3" placeholder="" required><?php echo $deskripsi;?></textarea>
										</div>
									</div>

									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Harga Lama(Rp)</label>
										<div class="col-sm-12">
											<input type="text" name="harga_lama" value="<?php echo $harga_baru;?>" class="form-control" id="regular13" required>
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Harga Baru(Rp)</label>
										<div class="col-sm-12">
											<input type="text" name="harga_baru" class="form-control" id="regular13">
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Stok</label>
										<div class="col-sm-12">
											<input type="text" name="stok" value="<?php echo $stok;?>" class="form-control" id="regular13">
										</div>
									</div>
									<div class="form-group">
										<label for="select13" class="col-sm-3 control-label">Kategori</label>
										<div class="col-sm-12">
											<select id="select13" name="kategori" class="form-control" required>
												<option value="">&nbsp;</option>
												<?php 
													foreach ($kat->result_array() as $k) {
														$k_id=$k['kategori_id'];
														$k_nama=$k['kategori_nama'];
														if($kat_id==$k_id)
															echo "<option value='$k_id' selected>$k_nama</option>";
														else
															echo "<option value='$k_id'>$k_nama</option>";
													}
												?>
												
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Gambar</label>
										<div class="col-sm-12">
											<input type="file" name="filefoto" class="form-control" id="regular13">
										</div>
									</div>
									
									
			        </div>
			        <div class="modal-footer">
			            <button class="btn btn-dark" data-dismiss="modal" aria-hidden="true">Tutup</button>
			            <button class="btn btn-primary" type="submit"><span class="fa fa-edit"></span> Edit</button>
			        </div>
			    </form>
			    </div>
			    </div>
			</div>
			<?php } ?>

			<!-- ============ MODAL HAPUS PENGGUNA =============== -->
			<?php 
				foreach ($data->result_array() as $a) {
					$id=$a['produk_id'];
					$nama=$a['produk_nama'];
								
			?>
			<div class="modal fade" id="modal_hapus_pengguna<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header">
				<h3 class="modal-title" id="myModalLabel">Hapus Produk</h3>
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			        
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'admin/produk/hapus_produk'?>" enctype="multipart/form-data">
			        <div class="modal-body">
									<div class="form-group">
										<label for="regular13" class="col-sm-2 control-label"></label>
										<div class="col-sm-12">
											<input type="hidden" name="kode" value="<?php echo $id;?>">
											<input type="hidden" name="kategori" value="<?php echo $nama;?>">
											<p>Apakah Anda yakin mau menghapus data <b><?php echo $nama;?></b> ?</p>
										</div>
									</div>
	
			        </div>
			        <div class="modal-footer">
			            <button class="btn btn-dark" data-dismiss="modal" aria-hidden="true">Tutup</button>
			            <button class="btn btn-primary" type="submit"><span class="fa fa-trash"></span> Hapus</button>
			        </div>
			    </form>
			    </div>
			    </div>
			</div>
			<?php } ?>