<?php echo form_open('verify-email'); ?>
<?php  if($error=$this->session->flashdata('otp_failed')):  ?>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="alert alert-danger">
                            <?= $error; ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
<!-- On Change pasword success success -->
<?php  if($error=$this->session->flashdata('otp_success_send')):  ?>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="alert alert-success">
                            <?= $error; ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <!-- end flash message -->
                <!-- On Change pasword success success -->
<?php  if($error=$this->session->flashdata('resend_otp_success')):  ?>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="alert alert-success">
                            <?= $error; ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <!-- end flash message -->
<div class="row">
    <div class="card col-sm-6 p-5">
        <p style="font-size: larger;">Verify Otp</p><h3>Welcome <?php echo $this->session->flashdata('customer_name'); ?></h3>
        <p>Hi <?php echo $this->session->flashdata('customer_name'); ?>, You Successfully Registration Our Site
            Please Go Your Email <a href="mailto:<?php echo $this->session->flashdata('customer_email'); ?>"><b><?php echo $this->session->flashdata('customer_email'); ?></b></a>
            And Active Your Account . Thank You Stay With Us.
        </p> 
        <hr>
         <lable>Otp</lable>
            <input class="form-control" type="text" name="otp" value="<?php echo set_value('otp'); ?>" placeholder="Enter your Otp" size="50" />
            <div class="text-danger"><?php echo form_error('otp') ?></div>
            
            <!-- submit delete part -->
            <div class="col-md-offset-2 col-md-10 p-2">
                <input class="btn btn-danger btn-sm" type="submit" value="Verify Email" />
                <a class="btn btn-warning btn-sm" href="<?= site_url('web/resendotp');?>">Resend OTP</a>
            </div>
    </div>
</div>