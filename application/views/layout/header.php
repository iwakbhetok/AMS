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

<header class="bg-primary header header-md navbar navbar-fixed-top-xs box-shadow">
    <div class="navbar-header aside-xs">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html"> <i class="fa fa-bars"></i> </a>
        <a href="" class="navbar-brand">
            <span>
                <img src="<?php echo base_url('assets/images/folder.png'); ?>" class="m-r-sm" alt="">
            </span>
        </a>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user">
            <i class="fa fa-cog"></i>
        </a>
    </div>
    <ul class="nav navbar-nav hidden-xs hidden-sm">
        <li>
            <a href="<?php echo base_url('media/dashboard') ?>"> <i class="i i-home icon"> </i> Beranda </a>             
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="i i-mail icon"> </i> Transaksi <span class="badge bg-white">0</span> <b class="caret"></b> </a> 
            <ul class="dropdown-menu animated fadeInUp">
                <span class="arrow top"></span>
                <li> <a href="<?php echo base_url('mail/inbox/list') ?>"> <span class="badge bg-info pull-right">0</span>Surat Masuk</a> </li>
                <li> <a href="<?php echo base_url('mail/outbox/list') ?>"> <span class="badge bg-info pull-right">0</span> Surat Keluar </a> </li>
                <li class="divider"></li>
                <li> <a href="<?php echo base_url('mail/report/inbox') ?>"> Laporan Surat Masuk</a> </li>
                <li> <a href="<?php echo base_url('mail/report/outbox') ?>"> Laporan Surat Keluar</a> </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="i i-share icon"> </i> Disposisi <span class="badge bg-white">0</span> <b class="caret"></b> </a> 
            <ul class="dropdown-menu animated fadeInUp">
                <span class="arrow top"></span>
                <li> <a href="<?php echo base_url('mail/disposition/inbox') ?>"> <span class="badge bg-info pull-right">0</span> Disposisi Masuk</a> </li>
                <li> <a href="<?php echo base_url('mail/disposition/outbox') ?>"> <span class="badge bg-info pull-right">0</span> Disposisi Keluar</a> </li>                                
            </ul>
        </li>
        <li>
            <a href="<?php echo base_url('mail/approval/list') ?>"> <i class="i i-checkmark2 icon"> </i> Persetujuan <span class="badge bg-white">0</span> </a> 
        </li>
        <li>
            <a href="<?php echo base_url('mail/revision/list') ?>"> <i class="i i-cycle icon"> </i> Revisi <span class="badge bg-white">0</span> </a> 
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="i i-cog2 icon"> </i> Master <b class="caret"></b> </a> 
            <ul class="dropdown-menu animated fadeInUp"> 
                <span class="arrow top"></span>
                <li> <a href="<?php echo base_url('master/department/list'); ?>"> Daftar Biro </a> </li>
                <li> <a href="<?php echo base_url('master/division/list'); ?>"> Daftar Bagian </a> </li>
                <li> <a href="<?php echo base_url('master/subdivision/list'); ?>"> Daftar Sub Bagian </a> </li>
                <li> <a href="<?php echo base_url('master/unit/list'); ?>"> Daftar Unit </a> </li>
                <li> <a href="<?php echo base_url('master/jobtitle/list'); ?>"> Daftar Jabatan </a> </li>
                <li class="divider"></li>
                <li> <a href="<?php echo base_url('user/group/list'); ?>"> Daftar Group Staff </a> </li>                
                <li> <a href="<?php echo base_url('user/account/list'); ?>"> Daftar Staff </a> </li>
            </ul>
        </li>
    </ul>
    <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">        
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">                 
                <span class="thumb-sm avatar pull-left">
                    <img src="<?php echo base_url('assets/images/userz.png'); ?>">
                </span>                 
                <?php echo $this->session->userdata('user_group_name'); ?> <b class="caret"></b> </a> 
            <ul class="dropdown-menu animated fadeInUp"> 
                <span class="arrow top"></span>
                <li> <a href="<?php echo base_url('media/logout'); ?>"> Logout </a> </li>
            </ul>
        </li>
    </ul>
</header>           