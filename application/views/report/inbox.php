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
        <p class="h4 font-thin m-r m-b-sm">Laporan Surat Masuk</p>
    </header>
    <section class="scrollable w-f">
        <div class="slim-scroll padder" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
            <div class="m-b-md"></div>
            <section class="panel panel-default">  		
                <div class="table-responsive">
                    <table class="table table-striped m-b-none" data-ride="" id="dt_a">
                        <thead>
                            <tr>
										<th width="10%">Nomor</th>                                
										<th width="13%">Nomor Surat</th>
										<th width="15%">Tanggal Surat</th>
										<th width="20%">Perihal</th>
										<th width="15%">Distribusi</th>
										<th width="15%">Sifat Surat</th>
										<th width="27%">Keterangan</th>
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
											<td width="13%"><?php echo $r->mail_number; ?></td>                     
											<td width="15%"><?php echo convert_date_to_indonesia_format($r->mail_date); ?></td> 
											<td width="20%"><?php echo $r->mail_subject; ?></td>
											<td width="25%"><?php echo $r->job_title_name; ?></td>
											<td width="15%">
												<?php if ($r->mail_type == '1') { ?>
													<?php echo 'Biasa' ?>
												<?php } else echo 'Rahasia' ?>
											</td>
											<td width="27%"><?php echo $r->descrip; ?></td>
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
            </section>
        </div>
    </section>
</section>

<script type="text/javascript">
    $(document).ready(function() {

        $('.popup-pdf').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });

    });
</script>