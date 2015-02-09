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
		<?php $user_group_id = $this->session->userdata('user_group_id'); foreach ($menu_headers as $r) {
			if ($r->url == '#') {
		?>
		<li>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="i <?php echo $r->icon;?> icon"> </i> <?php echo $r->name;?> <span class="badge bg-white"><?php echo $mail_inbox_disposition + $mail_outbox_disposition;?></span> <b class="caret"></b> </a> 
            <ul class="dropdown-menu animated fadeInUp">
                <span class="arrow top"></span>
				<?php $sub_headers = $this->menu_model->get_sub_header_menu($r->user_menu_id, $user_group_id);
					foreach ($sub_headers as $sub){
				?>
                <li> <a href="<?php echo base_url($sub->url) ?>"> 
					<?php if ($sub->notif == '1') {?>
						<span class="badge bg-info pull-right">
						<?php if($sub->deskripsi == 'disposisi masuk') { echo $mail_inbox_disposition;}
							  else if($sub->deskripsi == 'disposisi keluar') {echo $mail_outbox_disposition;}
							  else {}
						?></span>
					<?php } else {}?>
				<?php echo $sub->name;?></a> </li>
				<?php } ?>
            </ul>
        </li>
		<?php } else {?>
		<li>
            <?php if ($r->notif == '1'){?>
			<a href="<?php echo base_url($r->url) ?>"> <i class="i <?php echo $r->icon;?> icon"> </i><?php echo $r->name;?> 
			<span class="badge bg-white">
			<?php if($r->deskripsi == 'surat masuk') { echo $mail_inbox;}
					else if($r->deskripsi == 'surat keluar') {echo $mail_outbox;}
					else if($r->deskripsi == 'disposisi masuk') {echo $mail_inbox_disposition;}
					else if($r->deskripsi == 'disposisi keluar') {echo $mail_outbox_disposition;}
					else {}
				?>
			</span>
			</a>
			<?php } else {?>
			<a href="<?php echo base_url($r->url) ?>"> <i class="i <?php echo $r->icon;?> icon"> </i><?php echo $r->name;?> </a>
			<?php }?>
        </li>
		<?php } } ?>
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