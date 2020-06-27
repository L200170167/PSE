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
                                            <li class="breadcrumb-item active">Customer</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Manage Customer</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="header-title">Data Customer</h4>
                                    <p class="sub-header">
                                         </p>

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>


                                        <tbody>
										<?php 
								foreach ($data->result_array() as $a) {
									$id=$a['plg_id'];
									$nama=$a['plg_nama'];	
									$alamat=$a['plg_alamat'];
									$notelp=$a['plg_notelp'];
									$email=$a['plg_email'];
								
							?>
								<tr>
									<td><?php echo $nama;?></td>
									<td><?php echo $alamat;?></td>
									<td><?php echo $notelp;?></td>
									<td><?php echo $email;?></td>
									<td class="text-center">
										<a href="#" title="Lihat Detail" data-toggle="modal" data-target="#modal_edit_pengguna<?php echo $id;?>"><i class="fa fa-eye"></i></a>
										
										<a href="#" title="Hapus Pelanggan" data-toggle="modal" data-target="#modal_hapus_pengguna<?php echo $id;?>"><i class="fa fa-trash"></i></a>
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

		<!-- ============ MODAL EDIT PENGGUNA =============== -->
		<?php 
				foreach ($data->result_array() as $a) {
					$id=$a['plg_id'];
					$nama=$a['plg_nama'];	
					$alamat=$a['plg_alamat'];
					$notelp=$a['plg_notelp'];
					$email=$a['plg_email'];
					$register=$a['plg_register'];
								
			?>
			<div class="modal fade" id="modal_edit_pengguna<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header"><h3 class="modal-title" id="myModalLabel">Detail Pelanggan</h3>
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			        
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'admin/menu/update_menu'?>" enctype="multipart/form-data">
			        <div class="modal-body">
							<table>
								<tr>
									<td style="width:90px;">Nama</td>
									<td>:</td>
									<td style="width:160px;"><?php echo $nama;?></td>
									<td style="width:90px;">Email</td>
									<td>:</td>
									<td><?php echo $email;?></td>
								</tr>
								<tr>
									<td style="width:90px;">Alamat</td>
									<td>:</td>
									<td style="width:160px;"><?php echo $alamat;?></td>
									<td style="width:90px;">Kontak</td>
									<td>:</td>
									<td><?php echo $notelp;?></td>
								</tr>
								<tr>
									<td style="width:90px;">Registered</td>
									<td>:</td>
									<td style="width:160px;"><?php echo $register;?></td>
									<td style="width:90px;">ID</td>
									<td>:</td>
									<td><?php echo $id;?></td>
								</tr>
							</table>			
									
			        </div>
			        <div class="modal-footer">
			            <button class="btn btn-dark" data-dismiss="modal" aria-hidden="true">Tutup</button>
			        </div>
			    </form>
			    </div>
			    </div>
			</div>
			<?php } ?>

			<!-- ============ MODAL HAPUS PENGGUNA =============== -->
			<?php 
				foreach ($data->result_array() as $a) {
					$id=$a['plg_id'];
					$nama=$a['plg_nama'];	
								
			?>
			<div class="modal fade" id="modal_hapus_pengguna<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header"><h3 class="modal-title" id="myModalLabel">Hapus Pelanggan</h3>
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			        
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'admin/pelanggan/hapus_pelanggan'?>" enctype="multipart/form-data">
			        <div class="modal-body">
									<div class="form-group">
										<label for="regular13" class="col-sm-2 control-label"></label>
										<div class="col-sm-8">
											<input type="hidden" name="kode" value="<?php echo $id;?>">
											<input type="hidden" name="nama" value="<?php echo $nama;?>">
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