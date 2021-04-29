<style type="text/css">
    #result{color:red;padding: 5px}
    #result p{color:red}
</style>
<script  type="text/javascript">function myFunction() { var x = document.getElementById("myInput"); var x2 = document.getElementById("myInput2"); if (x.type === "password") { x.type = "text"; } else { x.type = "password"; } if (x2.type === "password") { x2.type = "text"; } else { x2.type = "password"; }} </script>
<div class="row">
   <div class="col-sm-8">
    <div class="card">
      <div class="card-body">
        <form method="post" action="<?php echo base_url('customer/save');?>">
           <div class="card-header text-center"><h3>Customer Register Form</h3></div>
           <div id="result">
            <p><?php echo $this->session->flashdata('message'); ?></p>
            </div> 
            <div class="form-group">  
              <label for="inputAddress">Full Name</label>
              <input type="text" name="customer_name" class="form-control" placeholder="Full Name" value="<?php echo set_value('customer_name'); ?>">
            </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputEmail4">Email</label>
              <input type="email" name="customer_email" class="form-control" placeholder="Email" value="<?php echo set_value('customer_email'); ?>">
            </div>
            <div class="form-group col-md-4">
              <label for="inputPassword4">Password</label>
              <input type="password" name="customer_password" id="myInput" class="form-control" placeholder="Password" value="<?php echo set_value('customer_password'); ?>">
              <input type="checkbox" onclick="myFunction()"> Show Password
            </div>
            <div class="form-group col-md-4">
              <label for="inputPassword4">Re-Enter Password</label>
              <input type="password" name="PasswordCnf" id="myInput2" class="form-control" placeholder="Re-Enter Password" value="<?php echo set_value('PasswordCnf'); ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="inputAddress">Address</label>
            <input type="text" name="customer_address" class="form-control" placeholder="1234 Main St" value="<?php echo set_value('customer_address'); ?>">
          </div>
          <div class="form-row">
            <div class="form-group col-md-5">
              <label for="inputCity">City</label>
              <input type="text" name="customer_city" placeholder="City" class="form-control" value="<?php echo set_value('customer_city'); ?>">
            </div>
            <div class="form-group col-md-4">
              <label for="inputState">State</label>
              <select name="customer_state" class="form-control" value="<?php echo set_value('customer_state'); ?>">
              <option value="Andhra Pradesh">Andhra Pradesh</option>
              <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
              <option value="Arunachal Pradesh">Arunachal Pradesh</option>
              <option value="Assam">Assam</option>
              <option value="Bihar">Bihar</option>
              <option value="Chandigarh">Chandigarh</option>
              <option value="Chhattisgarh">Chhattisgarh</option>
              <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
              <option value="Daman and Diu">Daman and Diu</option>
              <option value="Delhi">Delhi</option>
              <option value="Lakshadweep">Lakshadweep</option>
              <option value="Puducherry">Puducherry</option>
              <option value="Goa">Goa</option>
              <option value="Gujarat">Gujarat</option>
              <option value="Haryana">Haryana</option>
              <option value="Himachal Pradesh">Himachal Pradesh</option>
              <option value="Jammu and Kashmir">Jammu and Kashmir</option>
              <option value="Jharkhand">Jharkhand</option>
              <option value="Karnataka">Karnataka</option>
              <option value="Kerala">Kerala</option>
              <option value="Madhya Pradesh">Madhya Pradesh</option>
              <option value="Maharashtra">Maharashtra</option>
              <option value="Manipur">Manipur</option>
              <option value="Meghalaya">Meghalaya</option>
              <option value="Mizoram">Mizoram</option>
              <option value="Nagaland">Nagaland</option>
              <option value="Odisha">Odisha</option>
              <option value="Punjab">Punjab</option>
              <option value="Rajasthan">Rajasthan</option>
              <option value="Sikkim">Sikkim</option>
              <option value="Tamil Nadu">Tamil Nadu</option>
              <option value="Telangana">Telangana</option>
              <option value="Tripura">Tripura</option>
              <option value="Uttar Pradesh">Uttar Pradesh</option>
              <option value="Uttarakhand">Uttarakhand</option>
              <option value="West Bengal">West Bengal</option>
              </select>
            </div>
            <div class="form-group col-md-3">
              <label for="inputZip">Zip</label>
              <input type="number" name="customer_zipcode" class="form-control" value="<?php echo set_value('customer_zipcode'); ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="inputAddress2">Phone Number</label>
            <input type="number" name="customer_phone" class="form-control" placeholder="Enter 10 Digit mobile number" value="<?php echo set_value('customer_phone'); ?>">
          </div>
          <input class="my-btn" type="submit" value="Sign Up" />
           <p class="text-right">Already have Account? <a class="text-warning" href="<?php echo base_url('login');?>">Sign In</a></p>
        </form>
       </div>
    </div>
  </div>
    <div class="col-sm-4">
       <?php include('sidebar.php'); ?>
    </div>
</div>