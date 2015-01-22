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
        <a href="javascript:void(0)" class="navbar-brand">
            <span><img src="<?php echo base_url('assets/images/folder.png'); ?>" class="m-r-sm" alt=""></span>
        </a>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user">
            <i class="fa fa-ellipsis-v"></i>
        </a>
    </div>
    <ul class="nav navbar-nav hidden-xs hidden-sm">
        <li>
            <a href="<?php echo base_url('media/dashboard') ?>"> <i class="i i-home icon"> </i> Beranda </a>             
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="i i-mail icon"> </i> Transaksi <span class="badge bg-white"><?php echo $mail_inbox  + $mail_outbox ?></span> <b class="caret"></b> </a> 
            <ul class="dropdown-menu animated fadeInUp">
                <span class="arrow top"></span>
                <li> <a href="<?php echo base_url('mail/inbox/list') ?>"> <span class="badge bg-info pull-right"><?php echo $mail_inbox; ?></span>Surat Masuk</a> </li>
                <li> <a href="<?php echo base_url('mail/outbox/list') ?>"> <span class="badge bg-info pull-right"><?php echo $mail_outbox; ?></span> Surat Keluar </a> </li>
                <li class="divider"></li>
                <li> <a href="<?php echo base_url('report/inbox') ?>"> Laporan Surat Masuk</a> </li>
                <li> <a href="<?php echo base_url('report/outbox') ?>"> Laporan Surat Keluar</a> </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="i i-share icon"> </i> Disposisi <span class="badge bg-white"><?php echo $mail_inbox_disposition + $mail_outbox_disposition ?></span> <b class="caret"></b> </a> <?php //var_dump($mail_inbox_disposition);?>
            <ul class="dropdown-menu animated fadeInUp">
                <span class="arrow top"></span>
                <li> <a href="<?php echo base_url('disposition/inbox/list') ?>"> <span class="badge bg-info pull-right"><?php echo $mail_inbox_disposition; ?></span> Disposisi Masuk</a> </li>
                <li> <a href="<?php echo base_url('disposition/outbox/list') ?>"> <span class="badge bg-info pull-right"><?php echo $mail_outbox_disposition; ?></span> Disposisi Keluar</a> </li>                                
            </ul>
        </li>
        <li>
            <a href="<?php echo base_url('mail/approval') ?>"> <i class="i i-checkmark2 icon"> </i> Persetujuan <span class="badge bg-white"><?php echo $mail_approval; ?></span> </a> 
        </li>
        <li>
            <a href="<?php echo base_url('mail/revision') ?>"> <i class="i i-cycle icon"> </i> Revisi <span class="badge bg-white">0</span> </a> 
        </li>         
    </ul>
    <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">        
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">                 
                <span class="thumb-sm avatar pull-left">
                    <img src="<?php echo base_url('assets/images/userz.png'); ?>">
                </span>                 
                <?php echo $this->session->userdata('employee_name'); ?> <b class="caret"></b> </a> 
            <ul class="dropdown-menu animated fadeInUp"> 
                <span class="arrow top"></span>
                <li> <a href="<?php echo base_url('media/logout'); ?>"> Logout </a> </li>
            </ul>
        </li>
    </ul>
</header>           