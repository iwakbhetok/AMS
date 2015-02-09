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
        <a href="<?php echo base_url('user/group/add') ?>" class="btn btn-info btn-sm pull-right"> 
            <i class="glyphicon glyphicon-plus"></i> 
            Tambah Group Staff
        </a> 
        <p class="h4 font-thin m-r m-b-sm">Daftar Group Staff</p>
    </header>
    <section class="scrollable">
        <div class="slim-scroll padder" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
            <div class="m-b-md"></div>
            <section class="panel panel-default">  		
                <div class="table-responsive">
                    <table class="table table-striped table-hover m-b-none" data-ride="" id="dt_a">
                        <thead>
                            <tr>
                                <th width="10%">Nomor</th>
                                <th width="60%">Nama Group Staff</th>
                                <th width="25%">Level Group</th>
                                <th width="5%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($data_user as $r) {
                                ?>
                                <tr>                
                                    <td width="10%"><?php echo $no; ?></td> 
                                    <td width="60%"><?php echo $r->user_group_name; ?></td>
                                    <td width="25%"><?php echo $r->user_group_level; ?></td>
                                    <td width="5%">
                                        <div class="btn-group pull-right">
                                            <button class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">Pilihan <span class="caret"></span></button> 
                                            <ul class="dropdown-menu">
                                                <li><a href="#">Lihat</a></li>
                                                <li><a href="#">Ubah</a></li>
                                                <li><a href="#">Hapus</a></li>
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