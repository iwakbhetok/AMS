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
        <p class="h4 font-thin m-r m-b-sm">Edit Jabatan</p>         
    </header>
    <section class="scrollable">
        <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
            <div class="wrapper">                
                <form data-validate="parsley" action="<?php echo base_url('master/jobtitle/update'); ?>"  method="post">
                    <section class="panel panel-default">   
                        <header class="panel-heading font-bold"> Formulir Jabatan </header>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6"> 
                                    <div class="form-group">
                                        <label>Nama Jabatan</label> 
                                        <div> 
                                            <input type="text" name="val[job_title_name]" id="jobtitle_name" class="form-control" placeholder="Ketikkan nama jabatan" data-required="true" value="<?php echo $job_title_name; ?>">
                                        </div>
                                    </div>                                    
                                </div> 
                                <div class="col-sm-6">                                     
                                    <div class="form-group">
                                        <label>Keterangan</label> 
                                        <div> 
                                            <input type="text" name="val[description]" id="description" class="form-control" placeholder="Ketikkan keterangan" value="<?php echo $description; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">                                         
                                        <div> 
                                            <input type="hidden" name="id" id="jobtitle_id" class="form-control" value="<?php echo $job_title_id ?>"/>
                                            <input type="hidden" name="val[status]" id="status" class="form-control" value="1">                                                                                        
                                            <input type="hidden" name="val[updated_by]" id="updated_by" class="form-control" value="<?php echo $this->session->userdata('employee_id'); ?>">
                                            <input type="hidden" name="val[updated_date]" id="updated_date" class="form-control" value="<?php echo get_current_date_time() ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>                        
                        </div>
                        <footer class="panel-footer text-right bg-light lter">
                            <button type="submit" class="btn btn-success btn-s-xs">Simpan</button>
                            <a href="<?php echo base_url('master/jobtitle/list') ?>" type="submit" class="btn btn-danger btn-s-xs">Batal</a>
                        </footer>
                    </section>
                </form>                
            </div>                       
        </div>
    </section>
</section>