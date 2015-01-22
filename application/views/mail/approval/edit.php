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
        <p class="h4 font-thin m-r m-b-sm">Lembar Persetujuan Surat No : <?php echo $mail_number; ?>, Tanggal <?php echo $mail_date; ?></p>         
    </header>
    <section class="scrollable">
        <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
            <div class="wrapper">
                <?php echo form_open_multipart('mail/outbox/updateapproval') ?>                                
                <section class="panel panel-default">   
                    <header class="panel-heading font-bold"> Form Isian </header>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">                                                                                          
                                <div class="form-group"> 
                                    <label>N1</label> 
                                    <textarea class="form-control" name="val[n1]" rows="3" data-minwords="6" data-required="true" placeholder=""><?php echo $n1; ?></textarea> 
                                </div>
                                <div class="form-group"> 
                                    <label>N2</label> 
                                    <textarea class="form-control" name="val[n2]" rows="3" data-minwords="6" data-required="true" placeholder=""><?php echo $n2; ?></textarea> 
                                </div>
                            </div>
                        </div>                        
                    </div>
                </section>
                <section class="panel panel-default">   
                    <header class="panel-heading font-bold"> Approval </header>
                    <div class="panel-body">
                        <div class="row">                            
                            <div class="col-sm-12"> 
                                <?php
                                $no = 1;
                                foreach ($data_form as $r) {
                                    ?>
                                    <div class="form-group"> 
                                        <label>C<?php echo $no; ?></label> 
                                        <textarea class="form-control" rows="3" data-minwords="6" data-required="true" placeholder=""><?php echo $r->c; ?></textarea> 
                                    </div>
                                    <div class="form-group">
                                        <label>Kepada</label> 
                                        <div> 
                                            <select class="form-control m-b">
                                                <option><?php echo $r->too; ?></option>                                            
                                            </select>                                         
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Penandatangan</label> 
                                        <div> 
                                            <select class="form-control m-b">
                                                <option><?php echo $r->assigns; ?></option>                                               
                                            </select>                                          
                                        </div>
                                    </div>
                                    <?php
                                    $no++;
                                }
                                ?>
                            </div>
                        </div>                        
                    </div>
                </section>
                
                <section class="panel panel-default">   
                    <header class="panel-heading font-bold"> Approval Isian </header>
                    <div class="panel-body">
                        <div class="row">                            
                            <div class="col-sm-12">                                 
                                <div class="form-group"> 
                                    <label>C</label> 
                                    <textarea class="form-control" name="form[c]" rows="3" data-minwords="6" data-required="true" placeholder=""></textarea> 
                                </div>
                                <div class="form-group">
                                    <label>Kepada</label> 
                                    <div> 
                                        <select name="form[to]" class="form-control m-b">
                                            <option value =0>Pilih salah satu</option>
                                            <?php foreach ($data_user as $r) { ?>
                                                <option value="<?php echo $r->employee_id; ?>"><?php echo $r->employee_name; ?></option>
                                            <?php }
                                            ?>
                                        </select>                                          
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Penandatangan</label> 
                                    <div> 
                                        <select name="form[assign]" class="form-control m-b">
                                            <option value =0>Pilih salah satu</option>
                                            <?php foreach ($data_user as $r) { ?>
                                                <option value="<?php echo $r->employee_id; ?>"><?php echo $r->employee_name; ?></option>
                                            <?php }
                                            ?>
                                        </select>                                          
                                    </div>
                                </div>                                

                                <div class="form-group">                                         
                                    <div>       
                                        <input type="hidden" name="id" id="mail_id" class="form-control" value="<?php echo $mail_id ?>"/>
                                        
                                        <input type="hidden" name="val[mail_id]" class="form-control" value="<?php echo $mail_id ?>">
                                        <input type="hidden" name="form[mail_id]" class="form-control" value="<?php echo $mail_id ?>">

                                        <input type="hidden" name="val[created_by]" class="form-control" value="<?php echo $this->session->userdata('employee_id'); ?>">
                                        <input type="hidden" name="val[created_date]" class="form-control" value="<?php echo get_current_date_time() ?>">
                                        <input type="hidden" name="val[updated_by]" class="form-control" value="<?php echo $this->session->userdata('employee_id'); ?>">
                                        <input type="hidden" name="val[updated_date]" class="form-control" value="<?php echo get_current_date_time() ?>">

                                        <input type="hidden" name="form[created_by]" class="form-control" value="<?php echo $this->session->userdata('employee_id'); ?>">
                                        <input type="hidden" name="form[created_date]" class="form-control" value="<?php echo get_current_date_time() ?>">
                                        <input type="hidden" name="form[updated_by]" class="form-control" value="<?php echo $this->session->userdata('employee_id'); ?>">
                                        <input type="hidden" name="form[updated_date]" class="form-control" value="<?php echo get_current_date_time() ?>">
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <footer class="panel-footer text-right bg-light lter">
                        <button type="submit" class="btn btn-success btn-s-xs">Simpan</button>                            
                        <a href="<?php echo base_url('mail/outbox/list') ?>" class="btn btn-danger btn-s-xs">Batal</a>
                    </footer>
                </section>
                <?php
                echo form_close();
                ?>

            </div>                       
        </div>
    </section>
</section>