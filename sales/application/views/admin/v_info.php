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
                                            <li class="breadcrumb-item active">Info</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Manage Info</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12"><br>
                                    <h4 class="header-title">Data Info</h4>
                                    <p class="sub-header">
									<?php echo $this->session->flashdata('msg');?>
                                         </p>

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
										<tr>
											<th>No</th>
											<th>Nama</th>	
											<th>Email</th>	
											<th>Diskripsi</th>	
											<th>No HP</th>	
											<th>Alamat</th>	
											<th>Penjelasan</th>	
											<th>Google</th>	
											<th>Twitter</th>	
											<th>Facebook</th>	
											<th>Aksi</th>	
										</tr>
                                        </thead>


                                        <tbody>
										<?php 
											$no=0;
											foreach ($data->result_array() as $a) {
												$no++;
												$id=$a['id'];
												$nama=$a['nama'];	
												$penjelasan=$a['penjelasan'];	
												$diskripsi=$a['diskripsi'];	
												$alamat=$a['alamat'];	
												$email=$a['email'];	
												$nohp=$a['nohp'];	
												$google=$a['google'];	
												$fb=$a['fb'];	
												$twitter=$a['twitter'];	
											
										?>
											<tr>
												<td><?php echo $no;?></td>
												<td><?php echo $nama;?></td>
												<td><?php echo $email;?></td>
												<td><?php echo $diskripsi;?></td>
												<td><?php echo $nohp;?></td>
												<td><?php echo $alamat;?></td>
												<td><?php echo $penjelasan;?></td>
												<td><?php echo $google;?></td>
												<td><?php echo $twitter;?></td>
												<td><?php echo $fb;?></td>
												
												<td class="text-right">
													<a href="#" title="Edit row" data-toggle="modal" data-target="#modal_edit_pengguna<?php echo $id;?>"><i class="fa fa-edit"></i></a>
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
									$penjelasan=$a['penjelasan'];	
									$diskripsi=$a['diskripsi'];	
									$alamat=$a['alamat'];	
									$email=$a['email'];	
									$nohp=$a['nohp'];	
									$google=$a['google'];	
									$fb=$a['fb'];	
									$twitter=$a['twitter'];
								
			?>
			<div class="modal fade" id="modal_edit_pengguna<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header">
			        <h3 class="modal-title" id="myModalLabel">Edit Info</h3>
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'admin/info/update_info'?>" enctype="multipart/form-data">
			        <div class="modal-body">
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Nama</label>
										<div class="col-sm-12">
											<input type="hidden" name="id" value="<?php echo $id;?>">
											<input type="text" name="nama" value="<?php echo $nama;?>" class="form-control" id="regular13" required>
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Diskripsi</label>
										<div class="col-sm-12">
											<input type="text" name="diskripsi" value="<?php echo $diskripsi;?>" class="form-control" id="regular13" required>
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Alamat</label>
										<div class="col-sm-12">
											<input type="text" name="alamat" value="<?php echo $alamat;?>" class="form-control" id="regular13" required>
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">No Hp</label>
										<div class="col-sm-12">
											<input type="text" name="nohp" value="<?php echo $nohp;?>" class="form-control" id="regular13" required>
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Email</label>
										<div class="col-sm-12">
											<input type="text" name="email" value="<?php echo $email;?>" class="form-control" id="regular13" required>
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Penjelasan</label>
										<div class="col-sm-12">
											<input type="text" name="penjelasan" value="<?php echo $penjelasan;?>" class="form-control" id="regular13" required>
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Google</label>
										<div class="col-sm-12">
											<input type="text" name="google" value="<?php echo $google;?>" class="form-control" id="regular13" required>
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Facebook</label>
										<div class="col-sm-12">
											<input type="text" name="fb" value="<?php echo $fb;?>" class="form-control" id="regular13" required>
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Twitter</label>
										<div class="col-sm-12">
											<input type="text" name="twitter" value="<?php echo $twitter;?>" class="form-control" id="regular13" required>
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