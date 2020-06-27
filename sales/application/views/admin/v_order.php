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
                                            <li class="breadcrumb-item active">Order</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Manage Order</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="header-title">Data Order</h4>
                                    <p class="sub-header">
                                         </p>

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>Invoice</th>
                                            <th>Date</th>
                                            <th>Customer</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>


                                        <tbody>
										<?php 
											foreach ($data->result_array() as $a) {
											$id=$a['inv_no'];
											$tanggal=$a['inv_tanggal'];
											$plg_id=$a['inv_plg_id'];
											$plg_nama=$a['inv_plg_nama'];
											$status=$a['status_nama'];
											$total=$a['inv_total'];	
										?>
                                        <tr>
                                            <td><?php echo $id;?></td>
                                            <td><?php echo $tanggal;?></td>
                                            <td><?php echo $plg_nama;?></td>
                                            <td><?php echo number_format($total);?></td>
                                            <td><?php echo $status;?></td>
                                            <td class="text-center">
												<a href="#" title="Update Status Order" data-toggle="modal" data-target="#modal_edit_pengguna<?php echo $id;?>"><i class="fa fa-edit"></i></a>
												<a href="#" title="Detail Order" data-toggle="modal" data-target="#modal_detail<?php echo $id;?>"><i class="fa fa-eye"></i></a>
												<a href="#" title="Batalkan Order" data-toggle="modal" data-target="#modal_hapus_pengguna<?php echo $id;?>"><i class="fa fa-times"></i></a>
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
					$id=$a['inv_no'];
					$tanggal=$a['inv_tanggal'];
					$plg_id=$a['inv_plg_id'];
					$plg_nama=$a['inv_plg_nama'];
					$status=$a['status_nama'];
					$total=$a['inv_total'];
								
			?>
			<div class="modal fade" id="modal_detail<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header">
					<h3 class="modal-title" id="myModalLabel">#<?php echo $id;?></h3>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			        
			        
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'admin/order/update_order'?>" enctype="multipart/form-data">
			        <div class="modal-body">
									<div class="form-group">
										<div class="col-sm-12">
											<table>
												<tr>
													<td style="width:120px;">Tanggal</td>
													<td>:</td>
													<td><?php echo $tanggal;?></td>
												</tr>
												<tr>
													<td>Pelanggan</td>
													<td>:</td>
													<td><?php echo $plg_nama;?></td>
												</tr>
												<tr>
													<td>Status Order</td>
													<td>:</td>
													<td><?php echo $status;?></td>
												</tr>
											</table><br/>
											<table class="table table-bordered">
												<thead>
													<tr>
														<th>Produk</th>
														<th style="text-align:center;">Harga</th>
														<th style="text-align:center;">jumlah</th>
														<th style="text-align:center;">Subtotal</th>
													</tr>
												</thead>
												<tbody>
													<?php
														$query=$this->db->query("SELECT * FROM tbl_detail WHERE detail_inv_no='$id'");
														foreach ($query->result_array() as $j) {
															$produk_nama=$j['detail_produk_nama'];
															$produk_harjul=$j['detail_harjul'];
															$produk_jumlah=$j['detail_jumlah'];
															$produk_subtotal=$j['detail_subtotal'];
														
													?>
													<tr>
														<td><?php echo $produk_nama;?></td>
														<td style="text-align:center;"><?php echo number_format($produk_harjul);?></td>
														<td style="text-align:center;"><?php echo $produk_jumlah;?></td>
														<td style="text-align:center;"><?php echo number_format($produk_subtotal);?></td>
													</tr>
													<?php } ?>
												</tbody>
												<tfoot>
													<tr>
														<td colspan="3">Total</td>
														<td style="text-align:center;"><?php echo number_format($total);?></td>
													</tr>
												</tfoot>
												
											</table>
										</div>
									</div>
									
									
			        </div>
			        <div class="modal-footer">
			            <button class="btn btn-dark" data-dismiss="modal" aria-hidden="true">Tutup</button>
			            <button class="btn btn-primary" type="submit"><span class="fa fa-edit"></span> Update</button>
			        </div>
			    </form>
			    </div>
			    </div>
			</div>
			<?php } ?>


			<!-- ============ MODAL EDIT PENGGUNA =============== -->
			<?php 
				foreach ($data->result_array() as $a) {
					$id=$a['inv_no'];
					$tanggal=$a['inv_tanggal'];
					$plg_id=$a['inv_plg_id'];
					$plg_nama=$a['inv_plg_nama'];
					$status=$a['inv_status'];
					$total=$a['inv_total'];

								
			?>
			<div class="modal fade" id="modal_edit_pengguna<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header">
			        <h3 class="modal-title" id="myModalLabel">Update Status Order</h3>
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'admin/order/update_order'?>" enctype="multipart/form-data">
			        <div class="modal-body">
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Pilih</label>
										<input type="hidden" name="kode" value="<?php echo $id;?>">
										<div class="col-sm-12">
											<select name="status" class="form-control" id="regular13" required>
												<?php foreach ($stts->result_array() as $st) {
													$st_id=$st['status_id'];
													$st_nm=$st['status_nama'];
												?>
												<option value="<?php echo $st_id;?>"><?php echo $st_nm;?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									
									
			        </div>
			        <div class="modal-footer">
			            <button class="btn btn-dark" data-dismiss="modal" aria-hidden="true">Tutup</button>
			            <button class="btn btn-primary" type="submit"><span class="fa fa-edit"></span> Update</button>
			        </div>
			    </form>
			    </div>
			    </div>
			</div>
			<?php } ?>

			<!-- ============ MODAL HAPUS PENGGUNA =============== -->
			<?php 
				foreach ($data->result_array() as $a) {
					$id=$a['inv_no'];
								
			?>
			<div class="modal fade" id="modal_hapus_pengguna<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header">
			        <h3 class="modal-title" id="myModalLabel">Hapus Order</h3>
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'admin/order/hapus_order'?>" enctype="multipart/form-data">
			        <div class="modal-body">
									<div class="form-group">
										<label for="regular13" class="col-sm-2 control-label"></label>
										<div class="col-sm-8">
											<input type="hidden" name="kode" value="<?php echo $id;?>">
											<p>Apakah Anda yakin mau menghapus data <b><?php echo $id;?></b> ?</p>
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