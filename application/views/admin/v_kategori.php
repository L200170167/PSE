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
                                            <li class="breadcrumb-item active">Category</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Manage Category</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box"><p><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal_add_pengguna"><span class="fa fa-plus"></span> Tambah Kategori</a></p>
								<br>
                                    <h4 class="header-title">Data Category</h4>
                                    <p class="sub-header">
									<?php echo $this->session->flashdata('msg');?>
                                         </p>

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
										<tr>
											<th>No</th>
											<th>Category</th>	
											<th class="text-right">Actions</th>
										</tr>
                                        </thead>


                                        <tbody>
										<?php 
											$no=0;
											foreach ($data->result_array() as $a) {
												$no++;
													$id=$a['kategori_id'];
													$nama=$a['kategori_nama'];		
											
										?>
											<tr>
												<td><?php echo $no;?></td>
												<td><?php echo $nama;?></td>
												
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
			        <h3 class="modal-title" id="myModalLabel">Tambah Kategori</h3>
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'admin/Kategori/simpan_Kategori'?>" enctype="multipart/form-data">
			        <div class="modal-body">
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Kategori</label>
										<div class="col-sm-12">
											<input type="text" name="Kategori" class="form-control" id="regular13" required>
										</div>
									</div>
			
									
			        </div>
			        <div class="modal-footer">
			            <button class="btn btn-dark" data-dismiss="modal" aria-hidden="true">Tutup</button>
			            <button class="btn btn-primary" type="submit"><span class="fa fa-save"></span> Simpan</button>
			        </div>
			    </form>
			    </div>
			    </div>
			</div>

			<!-- ============ MODAL EDIT PENGGUNA =============== -->
			<?php 
				foreach ($data->result_array() as $a) {
					$id=$a['kategori_id'];
					$nama=$a['kategori_nama'];
								
			?>
			<div class="modal fade" id="modal_edit_pengguna<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header">
			        <h3 class="modal-title" id="myModalLabel">Edit Kategori</h3>
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'admin/kategori/update_kategori'?>" enctype="multipart/form-data">
			        <div class="modal-body">
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Kategori</label>
										<div class="col-sm-12">
											<input type="hidden" name="kode" value="<?php echo $id;?>">
											<input type="text" name="kategori" value="<?php echo $nama;?>" class="form-control" id="regular13" required>
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
					$id=$a['kategori_id'];
					$nama=$a['kategori_nama'];
								
			?>
			<div class="modal fade" id="modal_hapus_pengguna<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header">
			        <h3 class="modal-title" id="myModalLabel">Hapus Kategori</h3>
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'admin/kategori/hapus_kategori'?>" enctype="multipart/form-data">
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