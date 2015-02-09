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
        <p class="h4 font-thin m-r m-b-sm">Detail Sub Bagian</p>         
    </header>
    <section class="scrollable">
        <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
            <div class="wrapper">                
                <form data-validate="parsley" action="<?php echo base_url('master/division/update'); ?>"  method="post">
                    <section class="panel panel-default">   
                        <header class="panel-heading font-bold"> Formulir Sub Bagian </header>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6"> 
                                    <div class="form-group">
                                        <label>Nama Biro</label> 
                                        <div> 
                                            <input type="text" name="val[department_name]" id="department_name" class="form-control" placeholder="Ketikkan nama biro" data-required="true" value="<?php echo $department_name; ?>" disabled="disabled">
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="col-sm-6"> 
                                    <div class="form-group">
                                        <label>Nama Bagian</label> 
                                        <div> 
                                            <input type="text" name="val[division_name]" id="division_name" class="form-control" placeholder="Ketikkan nama bagian" data-required="true" value="<?php echo $division_name; ?>" disabled="disabled">
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="col-sm-6"> 
                                    <div class="form-group">
                                        <label>Nama Sub Bagian</label> 
                                        <div> 
                                            <input type="text" name="val[sub_division_name]" id="division_name" class="form-control" placeholder="Ketikkan nama bagian" data-required="true" value="<?php echo $sub_division_name; ?>" disabled="disabled">
                                        </div>
                                    </div>                                    
                                </div> 
                                <div class="col-sm-6">                                     
                                    <div class="form-group">
                                        <label>Keterangan</label> 
                                        <div> 
                                            <input type="text" name="val[description]" id="description" class="form-control" placeholder="Ketikkan keterangan" value="<?php echo $description; ?>" disabled="disabled">
                                        </div>
                                    </div>
                                    <div class="form-group">                                         
                                        <div> 
                                            <input type="hidden" name="id" id="division_id" class="form-control" value="<?php echo $sub_division_id ?>"/>
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
                            <a href="<?php echo base_url('master/subdivision/edit/' . $sub_division_id); ?>" type="submit" class="btn btn-success btn-s-xs">Ubah</a>
                            <a href="<?php echo base_url('master/subdivision/list') ?>" type="submit" class="btn btn-danger btn-s-xs">Kembali</a>
                        </footer>
                    </section>
                </form>                
            </div>                       
        </div>
    </section>
</section>