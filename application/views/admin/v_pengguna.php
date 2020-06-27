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
                                            <li class="breadcrumb-item active">User</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Manage User</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box"><p><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal_add_pengguna"><span class="fa fa-plus"></span> Tambah Pengguna</a></p>
								<br>
                                    <h4 class="header-title">Data User</h4>
                                    <p class="sub-header">
									<?php echo $this->session->flashdata('msg');?>
                                         </p>

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
											<th>Nama</th>
											<th>Username</th>
											<th>Password</th>
											<th>Email</th>
											<th>Kontak</th>
											<th>Status</th>
											<th class="text-right">Actions</th>
										</tr>
                                        </thead>


                                        <tbody>
										<?php 
											foreach ($data->result_array() as $a) {
												$id=$a['pengguna_id'];
												$nama=$a['pengguna_nama'];
												$username=$a['pengguna_username'];
												$password=$a['pengguna_password'];
												$email=$a['pengguna_email'];
												$nohp=$a['pengguna_nohp'];
												$status=$a['pengguna_status'];
												$level=$a['pengguna_level'];
											
										?>
											<tr>
												<td><?php echo $nama;?></td>
												<td><?php echo $username;?></td>
												<td><?php echo $password;?></td>
												<td><?php echo $email;?></td>
												<th><?php echo $nohp?></th>
												<?php if($status=1):?>
													<th>Aktif</th>
												<?php else:?>
													<th>Non Aktif</th>
												<?php endif;?>
												<td class="text-center">
													<a href="#" title="Edit row" data-toggle="modal" data-target="#modal_edit_pengguna<?php echo $id;?>"><i class="fa fa-edit"></i></a>
													<a href="<?php echo base_url().'admin/pengguna/reset_password/'.$id;?>" title="Reset Password"><i class="fa fa-recycle"></i></a>
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
			        <h3 class="modal-title" id="myModalLabel">Tambah Pengguna</h3>
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'admin/pengguna/simpan_pengguna'?>" enctype="multipart/form-data">
			        <div class="modal-body">
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Nama</label>
										<div class="col-sm-12">
											<input type="text" name="nama" class="form-control" id="regular13" required>
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Username</label>
										<div class="col-sm-12">
											<input type="text" name="username" class="form-control" id="regular13" required>
										</div>
									</div>
									<div class="form-group">
										<label for="password13" class="col-sm-3 control-label">Password</label>
										<div class="col-sm-12">
											<input type="password" name="password" class="form-control" id="password13" required>
										</div>
									</div>
									<div class="form-group">
										<label for="password13" class="col-sm-3 control-label">Ulangi Password</label>
										<div class="col-sm-12">
											<input type="password" name="password2" class="form-control" id="password13" required>
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Email</label>
										<div class="col-sm-12">
											<input type="email" name="email" class="form-control" id="regular13" required>
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Kontak Person</label>
										<div class="col-sm-12">
											<input type="text" name="kontak" class="form-control" id="regular13" required>
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
					$id=$a['pengguna_id'];
					$nama=$a['pengguna_nama'];
					$username=$a['pengguna_username'];
					$password=$a['pengguna_password'];
					$email=$a['pengguna_email'];
					$nohp=$a['pengguna_nohp'];
					$status=$a['pengguna_status'];
					$level=$a['pengguna_level'];
								
			?>
			<div class="modal fade" id="modal_edit_pengguna<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header">
			        <h3 class="modal-title" id="myModalLabel">Edit Pengguna</h3>
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'admin/pengguna/update_pengguna'?>" enctype="multipart/form-data">
			        <div class="modal-body">
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Nama</label>
										<div class="col-sm-12">
											<input type="hidden" name="kode" value="<?php echo $id;?>">
											<input type="text" name="nama" value="<?php echo $nama;?>" class="form-control" id="regular13" required>
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Username</label>
										<div class="col-sm-12">
											<input type="text" name="username" value="<?php echo $username;?>" class="form-control" id="regular13" required>
										</div>
									</div>
									<div class="form-group">
										<label for="password13" class="col-sm-3 control-label">Password</label>
										<div class="col-sm-12">
											<input type="password" name="password" class="form-control" id="password13">
										</div>
									</div>
									<div class="form-group">
										<label for="password13" class="col-sm-3 control-label">Ulangi Password</label>
										<div class="col-sm-12">
											<input type="password" name="password2" class="form-control" id="password13">
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Email</label>
										<div class="col-sm-12">
											<input type="email" name="email" class="form-control" value="<?php echo $email;?>" id="regular13" required>
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Kontak Person</label>
										<div class="col-sm-12">
											<input type="text" name="kontak" class="form-control" value="<?php echo $nohp;?>" id="regular13" required>
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
					$id=$a['pengguna_id'];
					$nama=$a['pengguna_nama'];
								
			?>
			<div class="modal fade" id="modal_hapus_pengguna<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header">
			        <h3 class="modal-title" id="myModalLabel">Hapus Pengguna</h3>
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'admin/pengguna/hapus_pengguna'?>" enctype="multipart/form-data">
			        <div class="modal-body">
									<div class="form-group">
										<label for="regular13" class="col-sm-2 control-label"></label>
										<div class="col-sm-12">
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