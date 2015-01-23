<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
  ------------------------------------------------------------------------------
  AMS Applications
  ------------------------------------------------------------------------------

  Author : Abdul Gofur
  Email  : abdul.createit@gmail.com
  @2015

  ------------------------------------------------------------------------------
  Mabes Polri
  ------------------------------------------------------------------------------
 */
?>

<section class="vbox">
    <header class="header bg-dark lt box-shadow">        
        <p class="h4 font-thin m-r m-b-sm">Beranda</p>         
    </header>
    <section class="scrollable"> <!-- w-f -->
        <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">	
            <section class="wrapper">
                <div>
                    <h3 class="m-b-xs text-black">Selamat Datang, <?php echo $this->session->userdata('employee_name'); ?></h3>
                    <small>Aplikasi Manajemen Surat</small> 
                </div>
            </section>
            <section class="hbox">
                <aside class="col-lg-12 no-padder">
                    <section class="vbox">
                        <div class="wrapper">
                            <div class="row">
                                
                                <div class="col-md-12">
                                    <section class="panel">
                                        <!--div class="panel-body">
-                                            <div class="row m-t-xl m-b-xl">                                                       
-                                                <div class="text-center">
-                                                    <div class="thumb-lg avatar"> <img src="<?php echo('../assets/images/userz.png'); ?>" class="dker"> </div>                                                          
-                                                    <div class="h5 m-t m-b-xs font-bold text-lt"><?php echo $this->session->userdata('employee_name'); ?></div>
-                                                    <small class="m-b"><?php echo $this->session->userdata('job_title_name'); ?></small> <br>
-                                                </div> 
-                                            </div>                                                     
-                                        </div-->
										
									<div role="tabpanel">
									  <!-- Nav tabs -->
									  <ul class="nav nav-tabs" role="tablist">
										<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Statistik Surat</a></li>
										<li role="presentation"><a href="#list" aria-controls="list" role="tab" data-toggle="tab">Daftar Surat Masuk</a></li>
									  </ul>

									  <!-- Tab panes -->
									  <div class="tab-content">
										<div role="tabpanel" class="tab-pane fade in active" id="home">
											<header class="panel-heading font-bold">Statistik Surat</header>
                                        <div class="panel-body">
                                            <div id="flot-chart" style="height: 223px; padding: 0px; position: relative;">
<canvas height="222" width="493" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 493px; height: 240px;" class="flot-base"></canvas>
<div style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);" class="flot-text"><div style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;" class="flot-x-axis flot-x1-axis xAxis x1Axis"><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 70px; top: 225px; left: 14px; text-align: center;">0</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 70px; top: 225px; left: 92px; text-align: center;">1</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 70px; top: 225px; left: 170px; text-align: center;">2</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 70px; top: 225px; left: 248px; text-align: center;">3</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 70px; top: 225px; left: 326px; text-align: center;">4</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 70px; top: 225px; left: 404px; text-align: center;">5</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 70px; top: 225px; left: 482px; text-align: center;">6</div></div>
<div style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;" class="flot-y-axis flot-y1-axis yAxis y1Axis"><div class="flot-tick-label tickLabel" style="position: absolute; top: 213px; left: 6px; text-align: right;">0</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 198px; left: 6px; text-align: right;">2</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 184px; left: 6px; text-align: right;">4</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 170px; left: 6px; text-align: right;">6</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 156px; left: 6px; text-align: right;">8</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 142px; left: 0px; text-align: right;">10</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 128px; left: 0px; text-align: right;">12</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 114px; left: 0px; text-align: right;">14</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 99px; left: 0px; text-align: right;">16</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 85px; left: 0px; text-align: right;">18</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 71px; left: 0px; text-align: right;">20</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 57px; left: 0px; text-align: right;">22</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 43px; left: 0px; text-align: right;">24</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 29px; left: 0px; text-align: right;">26</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 15px; left: 0px; text-align: right;">28</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 1px; left: 0px; text-align: right;">30</div></div></div>
<canvas height="240" width="493" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 493px; height: 240px;" class="flot-overlay"></canvas><div class="legend"><div style="position: absolute; width: 77px; height: 31px; top: 13px; right: 13px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:13px;right:13px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(27,179,153);overflow:hidden"></div></div></td><td class="legendLabel">Unique Visits</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(23,123,187);overflow:hidden"></div></div></td><td class="legendLabel">Page Views</td></tr></tbody></table></div></div>
                                        </div>
											
										</div>
										<div role="tabpanel" class="tab-pane fade" id="list">
											<div class="table-responsive">
							<table class="table table-striped m-b-none" data-ride="" id="dt_b">
								<thead>
									<tr>
										<th width="10%">Nomor</th>                                
										<th width="15%">Nomor Surat</th>
										<th width="15%">Tanggal Surat</th>
										<th width="25%">Perihal</th>
										<th width="15%">Distribusi</th>
										<th width="15%">Sifat Surat</th>
										<th width="20%">Keterangan</th>
										<th width="5%"></th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($data_all_mail as $r) {
										?>
										<tr>                
											<td width="10%"><?php echo $r->mail_registry_number; ?></td>                                      
											<td width="15%"><?php echo $r->mail_number; ?></td>                     
											<td width="15%"><?php echo convert_date_to_indonesia_format($r->mail_date); ?></td> 
											<td width="25%"><?php echo $r->mail_subject; ?></td>
											<td width="25%"><?php echo $r->job_title_name; ?></td>
											<td width="15%">
												<?php if ($r->mail_type == '1') { ?>
													<?php echo 'Biasa' ?>
												<?php } else echo 'Rahasia' ?>
											</td>
											<td width="20%"><?php echo $r->descrip; ?></td>
											<td width="5%">
												<div class="btn-group pull-right">
													<button class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">Pilihan <span class="caret"></span></button> 
													<ul class="dropdown-menu">
														<li><a class="popup-pdf" href="<?php echo base_url('upload/inbox/' . $r->attachment) ?>">Baca Surat</a></li>                                              
													</ul>
												</div>
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
                                    </section>
                                </div>                                
                            </div>
							
                            <div>                    
                                <small><strong>BIRO SSDM POLRI</strong></small><br>
                                <small>Jl. Trunojoyo No. 3 Kebayoran Baru, Jakarta Selatan 12110</small>                                
                            </div>
                        </div>
                    </section>
                </aside>                                
            </section>
        </div>
    </section>     
    <!--footer class="footer bg-white b-t b-light">
        <p>Waktu Eksekusi : <strong>{elapsed_time}</strong>, Penggunaan Memori : <strong>{memory_usage}</strong></p>
    </footer--> 
</section>