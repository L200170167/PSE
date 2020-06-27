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
                                            <li class="breadcrumb-item active">Message</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Manage Message</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="header-title">Data Message</h4>
                                    <p class="sub-header">
                                         </p>

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Subject</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>


                                        <tbody>
										<?php 
								foreach ($data->result_array() as $a) {
									$id=$a['id'];
									$nama=$a['nama'];	
									$subjek=$a['subjek'];
									$email=$a['email'];
									$status=$a['status'];
								
							?>
								<tr>
									<td><?php echo $nama;?></td>
									<td><?php echo $email;?></td>
									<td><?php echo $subjek;?></td>
									<?php if ($status==0) { ?>
									<td>Pesan Baru</td>
									<?php } else { ?>
									<td>Sudah Dibaca</td>
									<?php } ?>
									<td class="text-center">
										<a href="#" title="Lihat Detail" data-toggle="modal" data-target="#modal_edit_pengguna<?php echo $id;?>"><i class="fa fa-eye"></i></a>
										
										<a href="#" title="Hapus Pesan" data-toggle="modal" data-target="#modal_hapus_pengguna<?php echo $id;?>"><i class="fa fa-trash"></i></a>
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
					$id=$a['id'];
					$nama=$a['nama'];	
					$subjek=$a['subjek'];
					$isi=$a['isi'];
					$email=$a['email'];
					$status=$a['status'];
								
			?>
			<div class="modal fade" id="modal_edit_pengguna<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
				<form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'admin/pesan/update_pesan'?>">
			    
			    <div class="modal-content">
			    <div class="modal-header"><h3 class="modal-title" id="myModalLabel">Detail Pesan</h3>
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			        
			    </div>
				<div class="modal-body">
					<input type="hidden" name="id" value="<?php echo $id;?>">
					<h5 class="font-16">Title</h5>
					<p><?php echo $subjek;?></p>
					<hr>
					<h5 class="font-16">Isi</h5>
					<p><?php echo $isi;?></p>
				</div>
			        <div class="modal-footer">
			            <button class="btn btn-dark" data-dismiss="modal" aria-hidden="true">Tutup</button>
						<button class="btn btn-primary" type="submit"><span class="fa fa-check"></span> Tandai Terbaca</button>
			        </div>
			    </div>
				</form>
			    </div>
			</div>
			<?php } ?>

			<!-- ============ MODAL HAPUS PENGGUNA =============== -->
			<?php 
				foreach ($data->result_array() as $a) {
					$id=$a['id'];
					$nama=$a['nama'];	
								
			?>
			<div class="modal fade" id="modal_hapus_pengguna<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header"><h3 class="modal-title" id="myModalLabel">Hapus Pesan</h3>
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			        
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'admin/pesan/hapus_pesan'?>" enctype="multipart/form-data">
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