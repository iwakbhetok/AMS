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
        <p class="h4 font-thin m-r m-b-sm">Revisi Surat No : <?php echo $mail_number; ?>, Tanggal <?php echo $mail_date; ?></p>         
    </header>
    <section class="scrollable">
        <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
            <div class="wrapper">
                <?php echo form_open_multipart('mail/do_upload') ?>                
                    <section class="panel panel-default">   
                        <header class="panel-heading font-bold"> Form Revisi Surat Keluar </header>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">                                
                                    <div class="form-group">
                                        <label>Nomor Surat</label> 
                                        <div> <input type="text" name="val[mail_number]" id="mail_number" class="form-control" placeholder="Ketikkan nomor surat"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Surat</label> 
                                        <div> <input class="datepicker-input form-control" name="val[mail_date]" id="mail_date" type="text" data-date-format="yyyy-mm-dd" placeholder="Pilih tanggal"> </div>
                                    </div>                                    
                                    <div class="form-group"> 
                                        <label>Perihal</label> 
                                        <textarea class="form-control" name="val[mail_subject]" id="mail_subject" rows="4" data-minwords="6" data-required="true" placeholder="Ketikkan perihal"></textarea> 
                                    </div>                                
                                </div>
                                <div class="col-sm-6">                                
                                    <div class="form-group">
                                        <label>Distribusi</label> 
                                        <div> 
                                            <select name="val[mail_approved_by]" id="mail_approved_by" class="form-control m-b">
                                                <option value =0>Pilih salah satu</option>
                                                <?php foreach ($data_user as $r) { ?>
                                                    <option value="<?php echo $r->employee_id; ?>"><?php echo $r->employee_name; ?></option>
                                                <?php }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Sifat Surat</label> 
                                        <div> 
                                            <select name="val[mail_type]" id="mail_type" class="form-control m-b">
                                                <option value="0">Pilih salah satu</option>
                                                <option value="1">Biasa</option>
                                                <option value="2">Rahasia</option>                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group"> 
                                        <label>Keterangan</label>
                                        <div>
                                            <textarea class="form-control" name="val[description]" id="description" rows="4" data-minwords="6" data-required="true" placeholder="Ketikkan keterangan"></textarea> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Sertakan File</label> 
                                        <div> <input type="file" name="dokumen" id="dokumen" class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s"> </div>
                                    </div>  
                                    <div class="form-group">                                         
                                        <div> 
                                            <input type="hidden" name="val[mail_approved]" id="status" class="form-control" value="0">
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
                            <a href="<?php echo base_url('mail/approval') ?>" type="submit" class="btn btn-danger btn-s-xs">Batal</a>
                        </footer>
                    </section>
                    <?php
                    echo form_close();
                    ?>
                
            </div>                       
        </div>
    </section>
</section>