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

<aside class="bg-dark aside-md hidden-print hidden-xs hidden-md hidden-lg" id="nav">
    <section class="vbox">
        <section class="scrollable">
            <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
                <!-- nav --> 
                <nav class="nav-primary hidden-xs">  
                    <a href="javascript:void(0)" class="navbar-brand">                        
                        <span class="hidden-nav-xs">Navigasi</span>
                    </a>						   
                    <ul class="nav nav-main" data-ride="collapse">
                        <li class=""> <a href="<?php echo base_url('media/dashboard'); ?>" class="auto"> <i class="i i-home icon"> </i> <span class="font-bold">Beranda</span> </a> </li>
                        <li>
                            <a href="#" class="auto"> <b class="badge bg-white pull-right icon">3</b> <i class="i i-mail icon"> </i> <span class="font-bold">Transasksi</span> </a> 
                            <ul class="nav dk">
                                <li> <a href="<?php echo base_url('mail/inbox'); ?>" class="auto"> <b class="badge bg-info pull-right">13</b> <i class="i i-dot"></i> <span>Surat Masuk</span> </a> </li>                            
                                <li> <a href="<?php echo base_url('mail/outbox'); ?>" class="auto"> <b class="badge bg-info pull-right">3</b> <i class="i i-dot"></i> <span>Surat Keluar</span> </a> </li>                            																		                      
                                <li class="divider"></li>
                                <li> <a href="<?php echo base_url('report/inbox'); ?>" class="auto"> <i class="i i-dot"></i> <span>Laporan Surat Masuk</span> </a> </li>
                                <li> <a href="<?php echo base_url('report/outbox'); ?>" class="auto"> <i class="i i-dot"></i> <span>Laporan Surat Keluar</span> </a> </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="auto"> <b class="badge bg-white pull-right">3</b> <i class="i i-share icon"> </i> <span class="font-bold">Disposisi</span> </a> 
                            <ul class="nav dk">
                                <li> <a href="<?php echo base_url('disposition/inbox'); ?>" class="auto"> <b class="badge bg-info pull-right">3</b> <i class="i i-dot"></i> <span>Disposisi Masuk</span> </a> </li>                            
                                <li> <a href="<?php echo base_url('disposition/outbox'); ?>" class="auto"> <b class="badge bg-info pull-right">3</b> <i class="i i-dot"></i> <span>Disposisi Keluar</span> </a> </li>                                                         
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo base_url('mail/approval'); ?>" class="auto"> <b class="badge bg-white pull-right">3</b> <i class="i i-checkmark2 icon"> </i> <span class="font-bold">Persetujuan</span> </a>                                     
                        </li>
                        <li>
                            <a href="<?php echo base_url('mail/revision'); ?>" class="auto"> <b class="badge bg-white pull-right">3</b> <i class="i i-cycle icon"> </i> <span class="font-bold">Revisi</span> </a>                                     
                        </li>
                        <?php if ($this->session->userdata('user_group_level') == '1') { ?>
                            <li class="dropdown">
                                <a href="#" class="auto"> <i class="i i-cog2 icon"> </i> <span class="font-bold">Master</span> </a> 
                                <ul class="nav dk">                                     
                                    <li> <a href="<?php echo base_url('master/department/list'); ?>" class="auto"> <i class="i i-dot"></i> Daftar Biro </a> </li>
                                    <li> <a href="<?php echo base_url('master/division/list'); ?>" class="auto"> <i class="i i-dot"></i> Daftar Bagian </a> </li>
                                    <li> <a href="<?php echo base_url('master/subdivision/list'); ?>" class="auto"> <i class="i i-dot"></i> Daftar Sub Bagian </a> </li>
                                    <li> <a href="<?php echo base_url('master/unit/list'); ?>" class="auto"> <i class="i i-dot"></i> Daftar Unit </a> </li>
                                    <li> <a href="<?php echo base_url('master/jobtitle/list'); ?>" class="auto"> <i class="i i-dot"></i> Daftar Jabatan </a> </li>
                                    <li class="divider"></li>
                                    <li> <a href="<?php echo base_url('user/group/list'); ?>" class="auto"> <i class="i i-dot"></i> Daftar Group Pengguna </a> </li>
                                    <li class="divider"></li>
                                    <li> <a href="<?php echo base_url('user/account/list'); ?>" class="auto"> <i class="i i-dot"></i> Daftar Staff </a> </li>
                                </ul>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
                <!-- / nav --> 
            </div>
        </section>                     
    </section>
</aside>