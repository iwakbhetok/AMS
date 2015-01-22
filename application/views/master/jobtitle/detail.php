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
        <p class="h4 font-thin m-r m-b-sm">Detail Jabatan</p>         
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
                                            <input type="text" name="val[jobtitle_name]" id="jobtitle_name" class="form-control" placeholder="Ketikkan nama jabatan" data-required="true" value="<?php echo $job_title_name; ?>" disabled="disabled">
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
                                            <input type="hidden" name="id" id="job_title_id" class="form-control" value="<?php echo $job_title_id ?>"/>
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
                            <a href="<?php echo base_url('master/jobtitle/edit/' . $job_title_id); ?>" type="submit" class="btn btn-success btn-s-xs">Ubah</a>
                            <a href="<?php echo base_url('master/jobtitle/list') ?>" type="submit" class="btn btn-danger btn-s-xs">Kembali</a>
                        </footer>
                    </section>
                </form>                
            </div>                       
        </div>
    </section>
</section>