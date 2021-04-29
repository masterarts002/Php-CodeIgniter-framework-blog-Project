<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- on failed -->
<div class="row">
    <div class="col-sm-8">
        <div class="card">
            <?php  if($error=$this->session->flashdata('otp_failed')):  ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-danger">
                        <?= $error; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>        

            <div class="card-header">
                <h4>Forgot your password?</h4>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url('customer/send-otp');?>" method="post">
                <div class="form-group">
                    <Label for="">Enter Your Registered Email ID to ResetPassword</Label>
                        <input type="email" name="customer_email" placeholder="Email ID" class="form-control" value="<?php echo set_value('customer_email'); ?>" />
                </div>
                <div class="form-group">
                        <input class="my-btn" type="submit" value="Get OTP">
                </div>
                </form>
            </div>    
        </div>
    </div>
    <div class="col-sm-4">
       <?php include('sidebar.php'); ?>
    </div>
</div>    