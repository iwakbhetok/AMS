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
        <p class="h4 font-thin m-r m-b-sm">Tambah Disposisi Surat No :  <?php echo $mail_number; ?></p>         
    </header>
    <section class="scrollable">
        <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
            <div class="wrapper">
                <?php echo form_open_multipart('mail/disposition/create/' . $mail_id) ?>                
                <section class="panel panel-default">   
                    <header class="panel-heading font-bold"> Form Disposisi </header>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-6">                                
                                <div class="form-group">
                                    <label>Kepada</label>
									<div class="checkbox">
									<?php foreach ($disposition_to as $r) { ?>
										<input class="form-control m-b" type="checkbox" id="mail_disposition_to" name="mail_disposition_to[]" value="<?php echo $r->employee_id; ?>"><?php echo $r->job_title_name; ?><br/><br/>
										<?php }
                                            ?>
									</div>
                                </div>								
                            </div>
                            <div class="col-sm-6">                                                                    
                                <div class="form-group">
                                    <label>Klasifikasi</label> 
                                    <div> 
                                        <select name="val[mail_disposition_status]" id="mail_type" class="form-control m-b">
                                            <option value="0">Pilih salah satu</option>
                                            <option value="1">Biasa</option>
                                            <option value="2">Rahasia</option>                                                
                                        </select>
                                    </div>
                                </div>                                                                                                          
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group"> 
                                    <label>Disposisi</label>
                                    <div>
                                        <textarea class="form-control" name="val[mail_disposition_subject]" id="description" rows="4" data-minwords="6" data-required="true" placeholder="Ketikkan keterangan"></textarea> 
                                    </div>
                                </div>
                                <div class="form-group">                                         
                                    <div> 
                                        <input type="hidden" name="val[id_mail_inbox]" id="status" class="form-control" value="<?php echo $mail_id; ?>">
                                        <input type="hidden" name="val[created_by]" id="created_by" class="form-control" value="<?php echo $this->session->userdata('employee_id'); ?>">
                                        <input type="hidden" name="val[created_date]" id="created_date" class="form-control" value="<?php echo get_current_date_time() ?>">
                                        <input type="hidden" name="val[updated_by]" id="updated_by" class="form-control" value="<?php echo $this->session->userdata('employee_id'); ?>">
                                        <input type="hidden" name="val[updated_date]" id="updated_date" class="form-control" value="<?php echo get_current_date_time() ?>">
                                    </div>
                                </div>
                            </div>                            
                        </div>                        
                    </div>
                    <footer class="panel-footer text-right bg-light lter">
                        <button type="submit" class="btn btn-success btn-s-xs">Simpan</button>                            
                        <a href="<?php echo base_url('mail/disposition/list/' . $mail_id) ?>" type="submit" class="btn btn-danger btn-s-xs">Batal</a>
                    </footer>
                </section>
                <?php
                echo form_close();
                ?>

            </div>                       
        </div>
    </section>
</section>