

<script  type="text/javascript">function myFunction() { var x = document.getElementById("myInput"); var x2 = document.getElementById("myInput2"); if (x.type === "password") { x.type = "text"; } else { x.type = "password"; } if (x2.type === "password") { x2.type = "text"; } else { x2.type = "password"; }} </script>
<div class="row">
    <div class="col-sm-8">
        <div class="card">
            <div class="card-body">
            <style type="text/css">
                #result{color:red;padding: 5px}
                #result p{color:red}
            </style>
            <div id="result">
                <p><?php echo $this->session->flashdata('message'); ?></p>
            </div>
            
            <form action="<?php echo base_url('customer/logincheck');?>" method="post">
            <div class="card-header text-center"><h3>Customer Login</h3></div>
            <div class="form-group">  
              <label for="inputAddress">Email</label>
                <input class="form-control" name="customer_email" placeholder="Enter Your Email" type="text" value="<?php echo set_value('customer_email'); ?>"/>
            </div>
            <div class="form-group">  
              <label for="inputAddress">Password</label>
                <input class="form-control" name="customer_password" placeholder="Enter Your Password" type="password" value="<?php echo set_value('customer_password'); ?>"/>
            </div>
                <p class="text-right">Forgot Passoword? <a class="text-warning" href="<?php echo base_url('forgot-password');?>">click here</a></p>
                <button class="my-btn" type="submit">Sign In</button>
                <p class="text-right">New here? <a class="text-warning" href="<?php echo base_url('register');?>">Sign Up</a></p>
            </form>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
       <?php include('sidebar.php'); ?>
    </div>
</div>