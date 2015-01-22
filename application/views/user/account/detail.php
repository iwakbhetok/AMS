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
        <p class="h4 font-thin m-r m-b-sm">Detail Staff</p>         
    </header>
    <section class="scrollable">
        <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
            <div class="wrapper">                
                <form data-validate="parsley" action="<?php echo base_url('master/unit/update'); ?>"  method="post">
                    <section class="panel panel-default">   
                        <header class="panel-heading font-bold"> Formulir Staff </header>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-4">                                     
                                    <div class="form-group">
                                        <label>NRP</label> 
                                        <div> 
                                            <input type="text" name="val[nrp]" id="description" class="form-control" placeholder="Ketikkan keterangan" value="<?php echo $nrp; ?>" disabled="disabled">
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="col-sm-4">                                     
                                    <div class="form-group">
                                        <label>Nama</label> 
                                        <div> 
                                            <input type="text" name="val[employee_name]" id="description" class="form-control" placeholder="Ketikkan keterangan" value="<?php echo $employee_name; ?>" disabled="disabled">
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="col-sm-4">                                     
                                    <div class="form-group">
                                        <label>Username</label> 
                                        <div> 
                                            <input type="text" name="val[user_name]" id="description" class="form-control" placeholder="Ketikkan keterangan" value="<?php echo $user_name; ?>" disabled="disabled">
                                        </div>
                                    </div>                                    
                                </div>
                                <!--
                                <div class="col-sm-4">                                     
                                    <div class="form-group">
                                        <label>Password</label> 
                                        <div> 
                                            <input type="password" name="val[user_password]" id="description" class="form-control" placeholder="Ketikkan keterangan" value="<?php echo $user_password; ?>" disabled="disabled">
                                        </div>
                                    </div>                                    
                                </div>
                                -->
                                <div class="col-sm-4"> 
                                    <div class="form-group">
                                        <label>Nama Biro</label> 
                                        <div> 
                                            <input type="text" name="val[department_name]" id="department_name" class="form-control" placeholder="Ketikkan nama biro" data-required="true" value="<?php echo $department_name; ?>" disabled="disabled">
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="col-sm-4"> 
                                    <div class="form-group">
                                        <label>Nama Bagian</label> 
                                        <div> 
                                            <input type="text" name="val[division_name]" id="division_name" class="form-control" placeholder="Ketikkan nama bagian" data-required="true" value="<?php echo $division_name; ?>" disabled="disabled">
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="col-sm-4"> 
                                    <div class="form-group">
                                        <label>Nama Sub Bagian</label> 
                                        <div> 
                                            <input type="text" name="val[sub_division_name]" id="sub_division_name" class="form-control" placeholder="Ketikkan nama bagian" data-required="true" value="<?php echo $sub_division_name; ?>" disabled="disabled">
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="col-sm-4"> 
                                    <div class="form-group">
                                        <label>Nama Sub Bagian</label> 
                                        <div> 
                                            <input type="text" name="val[unit_name]" id="unit_name" class="form-control" placeholder="Ketikkan nama unit" data-required="true" value="<?php echo $unit_name; ?>" disabled="disabled">
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="col-sm-4">                                     
                                    <div class="form-group">
                                        <label>Keterangan</label> 
                                        <div> 
                                            <input type="text" name="val[description]" id="description" class="form-control" placeholder="Ketikkan keterangan" value="<?php echo $description; ?>" disabled="disabled">
                                        </div>
                                    </div>
                                    <div class="form-group">                                         
                                        <div> 
                                            <input type="hidden" name="id" id="division_id" class="form-control" value="<?php echo $unit_id ?>"/>
                                            <input type="hidden" name="val[status]" id="status" class="form-control" value="1">                                                                                        
                                            <input type="hidden" name="val[updated_by]" id="updated_by" class="form-control" value="<?php echo $this->session->userdata('employee_id'); ?>">
                                            <input type="hidden" name="val[updated_date]" id="updated_date" class="form-control" value="<?php echo get_current_date_time() ?>">
                                        </div>
                                    </div>
                                </div>                                
                            </div>    
                            <div class="line line-dashed b-b line-lg pull-in"></div>
                            <strong>Detail</strong>
                            <div class="well b bg-light m-t">                                                                 
                                <p> 
                                    Dibuat oleh : <?php echo $created; ?><br>
                                    Pada tanggal : <?php echo $created_date; ?><br>
                                    Diubah oleh : <?php echo $updated; ?><br> 
                                    Pada tanggal: <?php echo $updated_date; ?>
                                </p>
                            </div>
                        </div>
                        <footer class="panel-footer text-right bg-light lter">
                            <a href="<?php echo base_url('user/account/edit/' . $employee_id); ?>" type="submit" class="btn btn-success btn-s-xs">Ubah</a>
                            <a href="<?php echo base_url('user/account/list') ?>" type="submit" class="btn btn-danger btn-s-xs">Kembali</a>
                        </footer>
                    </section>
                </form>                
            </div>                       
        </div>
    </section>
</section>