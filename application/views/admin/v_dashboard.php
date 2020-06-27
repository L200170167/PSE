<?php 
$l=$pen_last->row_array();
$c=$pen_now->row_array();
$p=$tot_jumlah->row_array();
$t=$tot_plg->row_array();
?>
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
                                            <li class="breadcrumb-item active">Dashboard</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Dashboard</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="card-box tilebox-one">
                                    <i class="icon-layers float-right m-0 h2 text-muted"></i>
                                    <h6 class="text-muted text-uppercase mt-0">past income</h6>
                                    <h3 class="my-3">Rp <span data-plugin="counterup"><?php echo number_format($l['total_penjualan']);?></span></h3>
                                    
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-3">
                                <div class="card-box tilebox-one">
                                    <i class="icon-paypal float-right m-0 h2 text-muted"></i>
                                    <h6 class="text-muted text-uppercase mt-0">income</h6>
                                    <h3 class="my-3">Rp <span data-plugin="counterup"><?php echo number_format($c['total_penjualan']);?></span></h3>
                                    
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-3">
                                <div class="card-box tilebox-one">
                                    <i class="icon-rocket float-right m-0 h2 text-muted"></i>
                                    <h6 class="text-muted text-uppercase mt-0">Product Sold</h6>
                                    <h3 class="my-3" data-plugin="counterup"><?php echo $p['total_jumlah'];?></h3>
                                    
                                </div>
                            </div>

							<div class="col-md-6 col-xl-3">
								<div class="card-box tilebox-one">
									<i class="icon-chart float-right m-0 h2 text-muted"></i>
									<h6 class="text-muted text-uppercase mt-0">customer</h6>
									<h3 class="my-3" data-plugin="counterup"><?php echo $t['tot_pelanggan']?></h3>
									
								</div>
							</div>
                        </div>
                        <!-- end row -->

						<div class="row">
                            <div class="col-lg-6 col-xl-8">
                                <div class="card-box">
									<h4 class="header-title mb-3">New Order</h4>

									<div class="table-responsive">
										<table class="table table-bordered table-nowrap mb-0">
											<thead>
												<tr>
													<th>No Invoice</th>
													<th>Customer</th>
													<th>Date</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($odr->result_array() as $o) {
														$oid=$o['inv_no'];
														$otgl=$o['inv_tanggal'];
														$oplg=$o['inv_plg_nama'];
														$status=$o['inv_status'];
												?>
												<tr>
													<th class="text-muted"><?php echo $oid;?></th>
													<td><?php echo $oplg; ?></td>
													<td><?php echo $otgl; ?></td>
													<?php if($status=='1') { ?>
													<td><span class="badge badge-warning">Pending</span></td>
													<?php } else if($status=='0') { ?>
													<td><span class="badge badge-danger">Cancel</span></td>
													<?php } else { ?>
													<td><span class="badge badge-success">Confirm</span></td>
													<?php } ?>
												</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
                                </div>
                            </div><!-- end col-->

                            <div class="col-lg-6 col-xl-4">
                                <div class="card-box">
								<h4 class="header-title mb-3">Inbox</h4>

									<div class="inbox-widget slimscroll" style="max-height: 324px;">
										<?php foreach ($psnb->result_array() as $oss) {
												$id=$oss['id'];
												$nama=$oss['nama'];
												$subjek=$oss['subjek'];
												$time=$oss['time'];
										?>
										<a href="<?php echo base_url(); ?>admin/pesan">
											<div class="inbox-item">
												<p class="inbox-item-author"><?php echo $nama; ?></p>
												<p class="inbox-item-text"><?php echo substr($subjek,0,25); ?></p>
												<p class="inbox-item-date"><?php echo date('H : i', strtotime($time)); ?></p>
											</div>
										</a>
										<?php } ?>
										
									</div>

                                </div>
                            </div><!-- end col-->
                        </div>
                        <!-- end row -->
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->