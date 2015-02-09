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
        <a href="<?php echo base_url('master/previllages/add') ?>" class="btn btn-info btn-sm pull-right"> 
            <i class="glyphicon glyphicon-plus"></i> 
            Tambah Menu
        </a> 
        <p class="h4 font-thin m-r m-b-sm">Daftar Menu</p>
    </header>
    <section class="scrollable">
        <div class="slim-scroll padder" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
            <div class="m-b-md"></div>
            <section class="panel panel-default">
				<form data-validate="parsley" action="<?php echo base_url('master/previllages/update'); ?>"  method="post">
                <div class="table-responsive">
                    <table class="table table-striped table-hover m-b-none" data-ride="" id="dt_x">
                        <thead>
                            <tr>
                                <th width="5%">Nomor</th>
                                <th width="10%">Nama Menu</th>
								<?php
									$no = 1;
									foreach ($list_group as $r) {
                                ?>
								<th width="10%"><?php echo $r->user_group_name;?></th>
								<?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($list_menu as $r) {
                                ?>
                                <tr>                
                                    <td width="5%"><?php echo $no; ?></td>  
                                    <td width="10%"><?php if($r->parent_id != NULL) {echo $r->name;} else { echo '<b>'.$r->name.'</b>';} ?></td>
									<?php
									foreach ($list_group as $s) {
									if ($r->url == "#"){?>
									<td width="10%"><input type="checkbox" id="checkbox<?php echo $r->user_menu_id;echo $s->user_group_id;?>" name="checkbox<?php echo $r->user_menu_id;echo $s->user_group_id;?>" disabled="disabled"/></td>
									<script>
										$("form").submit(function() {
											$("#checkbox<?php echo $r->user_menu_id;echo $s->user_group_id;?>").removeAttr("disabled");
										});
									</script>
									<?php } else {?>
									<td width="10%"><input type="checkbox" id="checkbox<?php echo $r->user_menu_id; echo $s->user_group_id;?>" name="checkbox<?php echo $r->user_menu_id;echo $s->user_group_id;?>"/></td>
									<script>
										$('#checkbox<?php echo $r->user_menu_id; echo $s->user_group_id;?>').click(function(){
											if($(this).is(':checked')){
												$('#checkbox<?php echo $r->parent_id;echo $s->user_group_id;?>').prop('checked', true);
											} else {
												$('#checkbox<?php echo $r->parent_id;echo $s->user_group_id;?>').prop('checked', false);
											}
										});
									</script>
									<?php }
									foreach ($list_menu_access as $t) {
									if (($t->id_user_menu == $r->user_menu_id) and ($t->id_user_group == $s->user_group_id) and ($t->menu_access == 1)) {									?>
									<script>
                                            document.getElementById("checkbox<?php echo $r->user_menu_id;?><?php echo $s->user_group_id;?>").checked = true;
                                    </script>
									<?php } else {}?>
									<?php } } ?>
                                </tr>
                                <?php
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
					<footer class="panel-footer text-right bg-light lter">
                            <button type="submit" class="btn btn-success btn-s-xs">Simpan</button>
                            <a href="javascript:history.back()" type="submit" class="btn btn-danger btn-s-xs">Batal</a>
                        </footer>
                </div>
				</form>
            </section>
        </div>
    </section>
</section>