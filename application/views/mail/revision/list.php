<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
  ------------------------------------------------------------------------------
  AMS Applications
  ------------------------------------------------------------------------------

  Author : Dadang Nurjaman
  Email  : mail.nurjaman@gmail.com
  @2014

  ------------------------------------------------------------------------------
  Mabes Polri
  ------------------------------------------------------------------------------
 */
?>

<section class="vbox">
    <header class="header bg-dark lt box-shadow">
        <p class="h4 font-thin m-r m-b-sm">Daftar Revisi</p>
    </header>
    <section class="scrollable">
        <div class="slim-scroll padder" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
            <div class="m-b-md"></div>
            <section class="panel panel-default">  		
                <div class="table-responsive">
                    <table class="table table-striped m-b-none" data-ride="" id="dt_a">
                        <thead>
                            <tr>
                                <th width="10%">No.</th>
                                <th width="15%">Dibuat Oleh</th>
                                <th width="15%">Tanggal Surat</th>
                                <th width="15%">Nomor Surat</th>                                
                                <th width="30%">Perihal</th> 
                                <th width="10%">Status</th>
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
                                    <td width="15%"><strong><?php echo $r->employee_name; ?></strong> <br> <?php echo $r->job_title_name; ?> <br> <?php echo $r->nrp; ?></td>
                                    <td width="15%"><?php echo $r->mail_date; ?></td>
                                    <td width="15%"><?php echo $r->mail_number; ?></td>                                     
                                    <td width="30%"><?php echo $r->mail_subject; ?></td>                                                                       
                                    <td width="10%"><?php echo $r->mail_revision_status; ?></td>
                                    <td width="5%">
                                        <div class="btn-group pull-right">
                                            <button class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">Pilihan <span class="caret"></span></button> 
                                            <ul class="dropdown-menu">
                                                <li><a href="#">Lihat Surat</a></li>
                                                <li><a href="#">Persetujuan</a></li>
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