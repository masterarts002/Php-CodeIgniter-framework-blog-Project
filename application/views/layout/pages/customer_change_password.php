<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script  type="text/javascript">
            function myFunction() {
             var x = document.getElementById("myInput");
             if (x.type === "password") {
             x.type = "text";
             } else {
              x.type = "password";
             }
             }
         </script>
<!-- on failed -->
<div class="row">
    <div class="col-sm-8">
        <div class="card">
            <?php  if($error=$this->session->flashdata('change_failed')):  ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-danger">
                        <?= $error; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>        

            <div class="card-header">
                <h4>Change Password</h4>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url('customer/change-pw');?>" method="post">
                <div class="form-group">
                    <lable>Old Password</lable>
                    <input class="form-control" type="password" name="oldpassword" value="<?php echo set_value('oldpassword'); ?>" placeholder="Enter User Name" size="50" />
                </div>
                
                <div class="form-group">
                <lable>New Password</lable>
                <input class="form-control" type="password" id="myInput" name="Password" value="<?php echo set_value('Password'); ?>" placeholder="Enter Password" size="50" />
                </div>
                
                <div class="form-group">
                <lable>Password Confirm</lable>
                <input class="form-control" type="password" name="passconf" value="<?php echo set_value('passconf'); ?>" placeholder="Re-Enter Password" size="50" />
                <input type="checkbox" onclick="myFunction()"> Show Password
                </div>
                
                <div class="form-group">
                  <button class="my-btn" type="submit">Change</button>
                </div>
                </form>
            </div>    
        </div>
    </div>
    <div class="col-sm-4">
       <?php include('sidebar.php'); ?>
    </div>
</div>    