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
		<?php if (in_array('tambahSuratMasuk', $btn_list)) { ?>     
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
				<div class="table-responsive">
							<table class="table table-striped m-b-none" data-ride="" id="dt_a">
								<thead>
									<tr>
										<th width="5%" style="display:none;">No</th>
										<th width="10%">Nomor Agenda</th>  
										<th width="15%">Nomor Surat</th>
										<th width="15%">Tanggal Surat</th>
										<th width="15%">Dari</th>
										<th width="15%">Perihal</th>
										<th width="15%">Distribusi</th>
										<th width="15%">Status</th>
										<th width="20%">Keterangan</th>
										<th width="5%"></th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($data_mail as $r) {
										if (($r->status_read == '0') && ($r->mail_approved_by == $this->session->userdata('employee_id'))) {?>
										<tr style="color:#C76114;font-weight:bold;">
										<?php } else {?>
										<tr>
										<?php } ?>
											<td width="5%" style="display:none;"><?php echo $no; ?></td>
											<td width="10%"><?php echo $r->mail_registry_number; ?></td> 
											<td width="15%"><?php echo $r->mail_number; ?></td>                     
											<td width="15%"><?php echo convert_date_to_indonesia_format($r->mail_date); ?></td> 
											<td width="15%"><?php echo $r->mail_from; ?></td>
											<td width="15%"><?php echo $r->mail_subject; ?></td>
											<td width="25%"><?php echo $r->job_title_name; ?></td>
											<td width="15%">
												<?php if ($r->status_inbox == '1' ? print '<b>Selesai</b>' : print '<b><font style="color:#cc0000;">Dalam Proses</font></b>'); ?>
											</td>
											<td width="20%"><?php echo $r->descrip; ?></td>
											<td width="5%">
												<div class="btn-group pull-right">
													<button class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">Pilihan <span class="caret"></span></button> 
													<ul class="dropdown-menu">
														<?php if ($r->mail_approved_by != $this->session->userdata('employee_id')) {?>
														<li><a class="popup-pdf" id="read_mail" href="<?php echo base_url('upload/inbox/' . $r->attachment) ?>">Baca Surat</a></li>
														<?php } else {?>
														<li><a class="popup-pdf" id="read_mail_<?php echo $r->mail_inbox_id;?>" href="<?php echo base_url('upload/inbox/' . $r->attachment) ?>">Baca Surat</a></li>
														<?php }?>
														<script>
														$("#read_mail_<?php echo $r->mail_inbox_id;?>").click(function () {
																var data = <?php echo $r->mail_inbox_id;?>;
																$.ajax({

																	type: 'POST',
																	url:"<?php echo base_url('mail/inbox/read/' . $r->mail_inbox_id) ?>",
																	data : { pid : data},
																	success:function(result){
																		MagnificPopup();
																		window.location.reload(true);

																}});
															});
														</script>
														<?php if ($r->created_by == $this->session->userdata('employee_id') || $r->mail_approved_by == $this->session->userdata('employee_id') || $r->approved_by == $this->session->userdata('employee_id')) {?>
														<li><a href="<?php echo base_url('mail/disposition/list/' . $r->mail_inbox_id) ?>">Disposisi</a></li>
															<?php } else {?>
														
														<?php }?>
														<?php if ($r->created_by == $this->session->userdata('employee_id')) {
															?>
															<li><a href="<?php echo base_url('mail/inbox/edit/' . $r->mail_inbox_id) ?>">Ubah</a></li>
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
				
            </section>
        </div>
    </section>
</section>