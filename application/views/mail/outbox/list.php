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
        <a href="<?php echo base_url('mail/outbox/add') ?>" class="btn btn-info btn-sm pull-right"> 
            <i class="glyphicon glyphicon-plus"></i> 
            Tambah Surat Keluar
        </a> 
        <p class="h4 font-thin m-r m-b-sm">Daftar Surat Keluar</p>
    </header>
    <section class="scrollable">
        <div class="slim-scroll padder" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
            <div class="m-b-md"></div>
            <section class="panel panel-default">  		
                <div class="table-responsive">
                    <table class="table table-striped m-b-none" data-ride="" id="dt_a">
                        <thead>
                            <tr>
                                <th width="10%">Nomor</th>                                
                                <th width="15%">Nomor Surat</th>                                
                                <th width="35%">Perihal</th>                                
                                <th width="20%">Sifat Surat</th>
                                <th width="20%">Status Surat</th>                                
                                <th width="5%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($data_mail as $r) {
                                ?>
                                <tr>                
                                    <td width="10%"><?php echo $no; ?></td>                                      
                                    <td width="15%"><?php echo $r->mail_number; ?></td>                                                         
                                    <td width="35%"><?php echo $r->mail_subject; ?></td>                                     
                                    <td width="20%">
                                        <?php if ($r->mail_type == '1') { ?>
                                            <?php echo 'Biasa' ?>
                                        <?php } else echo 'Rahasia' ?>
                                    </td>
                                    <td width="20%">
                                        <?php if ($r->mail_status == '1') { ?>
                                            <?php echo 'Proses' ?>
                                        <?php } else echo 'Konsep' ?>
                                    </td>                                    
                                    <td width="5%">
                                        <div class="btn-group pull-right">
                                            <button class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">Pilihan <span class="caret"></span></button> 
                                            <ul class="dropdown-menu">
                                                <li><a class="popup-pdf" href="<?php echo base_url('upload/outbox/' . $r->attachment) ?>">Baca Surat</a></li>
                                                <?php if ($r->mail_status == '1') { ?>
                                                    <li><a href="<?php echo base_url('mail/outbox/editapproval/' . $r->mail_outbox_id) ?>">Praninjau</a></li>
                                                <?php } else { ?> 
                                                    <li><a href="<?php echo base_url('mail/outbox/approval/' . $r->mail_outbox_id) ?>">Persetujuan</a></li>                                                                                                                                                  
                                                    <?php } ?> 
                                                    <li><a class="popup-pdf" href="<?php echo base_url('mail/revision/' . $r->mail_outbox_id) ?>">Revisi</a></li>
                                                        <?php if ($r->created_by == $this->session->userdata('employee_id')) { ?>
                                                        <li><a href="<?php echo base_url('mail/outbox/edit/' . $r->mail_outbox_id) ?>">Ubah</a></li>
                                                    <?php } ?>                                                
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