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
		<?php $job_title_id = array(6,13,18); if (in_array($this->session->userdata('job_title_id'), $job_title_id)) { ?>     
        <a href="<?php echo base_url('mail/inbox/add') ?>" class="btn btn-info btn-sm pull-right"> 
            <i class="glyphicon glyphicon-plus"></i> 
            Tambah Surat Masuk
        </a> 
		<?php }
			?>
        <p class="h4 font-thin m-r m-b-sm">Daftar Surat Masuk</p>
    </header>
    <section class="scrollable">
        <div class="slim-scroll padder" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
            <div class="m-b-md"></div>
            <section class="panel panel-default">
			<div class="m-b-md"></div>
				<div role="tabpanel">

				  <!-- Nav tabs -->
				  <ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Surat Masuk</a></li>
					<li role="presentation"><a href="#list" aria-controls="list" role="tab" data-toggle="tab">Surat Masuk Lainnya</a></li>
				  </ul>

				  <!-- Tab panes -->
				  <div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="home">
					
						<div class="table-responsive">
							<table class="table table-striped m-b-none" data-ride="" id="dt_a">
								<thead>
									<tr>
										<th width="10%">Nomor</th>                                
										<th width="15%">Nomor Surat</th>
										<th width="15%">Tanggal Surat</th>
										<th width="25%">Perihal</th>
										<th width="15%">Sifat Surat</th>
										<th width="20%">Keterangan</th>
										<th width="5%"></th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($data_mail as $r) {
										?>
										<tr>                
											<td width="10%"><?php echo $r->mail_registry_number; ?></td>                                      
											<td width="15%"><?php echo $r->mail_number; ?></td>                     
											<td width="15%"><?php echo convert_date_to_indonesia_format($r->mail_date); ?></td> 
											<td width="25%"><?php echo $r->mail_subject; ?></td>
											<td width="15%">
												<?php if ($r->mail_type == '1') { ?>
													<?php echo 'Biasa' ?>
												<?php } else echo 'Rahasia' ?>
											</td>
											<td width="20%"><?php echo $r->description; ?></td>
											<td width="5%">
												<div class="btn-group pull-right">
													<button class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">Pilihan <span class="caret"></span></button> 
													<ul class="dropdown-menu">
														<li><a class="popup-pdf" href="<?php echo base_url('upload/inbox/' . $r->attachment) ?>">Baca Surat</a></li>
														<li><a href="<?php echo base_url('mail/disposition/list/' . $r->mail_id) ?>">Disposisi</a></li>
														<?php if ($r->created_by == $this->session->userdata('employee_id')) {
															?>
															<li><a href="<?php echo base_url('mail/inbox/edit/' . $r->mail_id) ?>">Ubah</a></li>
														<?php }
														?>                                                
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
    </section>
</section>