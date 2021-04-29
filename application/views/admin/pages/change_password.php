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

<!-- start: Content -->
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url('dashboard')?>">Home</a>
            <i class="icon-angle-right"></i> 
        </li>
        <li>
            <i class="icon-edit"></i>
            <a href="<?php echo base_url('dashboard-change-password')?>">Change Password</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Cahnge your password</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <style type="text/css">
                #result{color:red;padding: 5px}
                #result p{color:red}
            </style>
            <div id="result">
                <p><?php echo $this->session->flashdata('message');?></p>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="<?php echo base_url('save-new-password')?>" method="post">
                    <fieldset>

                        <div class="form-group">
                        <lable>Old Password</lable><br>
                        <input class="form-control" type="password" name="oldpassword" value="<?php echo set_value('oldpassword'); ?>" placeholder="Enter User Name" size="50" />
                        </div>
                         
                        <div class="form-group">
                        <lable>New Password</lable><br>
                        <input class="form-control" type="password" id="myInput" name="Password" value="<?php echo set_value('Password'); ?>" placeholder="Enter Password" size="50" />
                        </div>
                         
                        <div class="form-group">
                        <lable>Password Confirm</lable><br>
                        <input class="form-control" type="password" name="passconf" value="<?php echo set_value('passconf'); ?>" placeholder="Re-Enter Password" size="50" />
                        <br><input type="checkbox" onclick="myFunction()"> Show Password
                        </div>
                         
                        <div class="form-group">
                          <button class="my-btn" type="submit">Change</button>
                        </div>
                    </fieldset>
                </form>   

            </div>
        </div><!--/span-->

    </div><!--/row-->


</div><!--/.fluid-container-->

<!-- end: Content -->