

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <title><?= $site_title; ?></title>
    <meta name="description" content="<?= $description; ?>">
    <meta name="keywords" content="<?= $keywords; ?>">
    <meta name="copyright" content="astrostarmagik.com" />
    <meta name="robots" content="INDEX, FOLLOW" />
    <meta name="googlebot" content="NOODP" />
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <link rel="icon" href="<?= base_url('uploads/'.$site_favicon) ?>" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- fontawesome CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Site CSS -->
    <link href="<?php echo base_url() ?>assets/layout/css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.7.2/styles/default.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.7.2/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
  
<!-- custom js -->
<script type="text/javascript">

if ($(window).width() > 992) {
	$(window).scroll(function(){  
	   if ($(this).scrollTop() > 40) {
		  $('#navbar_top').addClass("fixed-top");
		  $('#logo').addClass("col-2");
		  $('#logo').removeClass("logo");
		  $('#logo').removeClass("col-9");
		  $('#logo').removeClass("mt-1");
		  $('#logo').removeClass("mb-1");
		  // add padding top to show content behind navbar
		  $('body').css('padding-top', $('.navbar').outerHeight() + 'px');
		}else{
		  $('#navbar_top').removeClass("fixed-top");
      $('#logo').addClass("logo");
      $('#logo').addClass("col-9");
      $('#logo').addClass("mt-1");
      $('#logo').addClass("mb-1");
		   // remove padding top from body
		  $('body').css('padding-top', '0');
		}   
	});
  }

  
	$(window).on('load',function(){  
    if ($(window).width() < 720 & $(window).width() > 550) {
		  $('#sidebar').addClass("hidden");
		  $('#sidebar').removeClass("col-sm-3");
      $('#sidebar').removeClass("col-sm-3");
		  $('#main').addClass("col-sm-12");
      document.getElementById("sidebar").style.display = "none";
		}else{
		}   
	});
</script>
    


    <title>Astro Megic</title>
  </head>
  <body>
    <div class="container">
        <div class="row topbar">
            <div class="col-sm-12 pt-2 pb-2 ">
              <div class="topbar-menu d-flex justify-content-between">
                <div style="padding-left: 50px">
                  <a href="<?= $get_identity->company_facebook ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                  <a href="<?= $get_identity->company_twitter ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                  <a href="<?= $get_identity->site_insta_link ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>
                <div style="padding-right: 50px">
                  <a href="<?= 'tel:'.$get_identity->company_number ?>"><i class="fa fa-phone" aria-hidden="true"></i>  <?= $get_identity->company_number ?></a>
                  <a href="<?= 'mailto:'.$get_identity->company_email ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i> <?= $get_identity->company_email ?></a>
                </div>
              </div>
            </div>
        </div>

       


        <!-- navbar menu -->
        <div class="row">
          <div class="col-sm-12 pr-0 pl-0">
            <nav id="navbar_top" class="navbar navbar-expand-lg navbar-light bg-light pt-0 pb-0">
                   
                    <a class="navbar-brand" href="<?= base_url('/') ?>"><img class="img-fluid" src="<?= base_url('uploads/'.$get_identity->site_logo); ?>" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                   <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav mr-auto">
                      <?php foreach($get_main_menu as $main_menu) : ?>
                        <?php $this->db->select('*');
                        $this->db->from('menu');
                        $this->db->order_by('position','ASC');
                        $this->db->where('parent_id', $main_menu->id);
                        $query = $this->db->get();
                        $submenu = $query->result();
                        ?>
                        <?php if($submenu) : ?>
                       <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="<?= $main_menu->url; ?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $main_menu->title; ?></a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php foreach($submenu as $row) : ?>
                          <a class="dropdown-item" href="<?= $row->url; ?>"><?= $row->title; ?></a>
                          <div class="dropdown-divider"></div>
                        <?php endforeach; ?>
                        </div>
                      </li>
                        <?php else : ?>
                       <li class="nav-item">
                        <a class="nav-link" href="<?= $main_menu->url; ?>"><?= $main_menu->title; ?></a>
                      </li>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </ul>
                    <form class="logo" action="<?php echo base_url('search');?>" method="post">
                      <div class="input-group mb-2 mt-2">
                        <input type="text" name="search" class="form-control" placeholder="Product Search">
                        <div class="input-group-append">
                          <button class="btn btn-outline-warning" type="submit">Search</button>
                        </div>
                      </div>
                    </form>
                </div>
            </nav>
          </div>
        </div>
        

   
      <!--/.Content-->    
  <!-- padding -->


<!-- Modal for services -->

 <!-- Modal for login -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg">
        <h5 class="modal-title" id="exampleModalLongTitle">Customer Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('customer/logincheck');?>" method="post">
        <div class="form-group">  
          <label for="inputAddress">Email</label>
            <input class="form-control" name="customer_email" placeholder="Enter Your Email" type="text" value="<?php echo set_value('customer_email'); ?>"/>
        </div>
        <div class="form-group">  
          <label for="inputAddress">Password</label>
            <input class="form-control" name="customer_password" placeholder="Enter Your Password" type="password" value="<?php echo set_value('customer_password'); ?>"/>
        </div>
            <p class="text-right">Forgot Passoword? <a class="text-warning" data-dismiss="modal" data-toggle="modal" data-target="#forgot" href="#">click here</a></p>
            <div class="d-flex justify-content-between"><button class="my-btn" type="submit">Sign In</button>
            <span class="text-right">New here? <a class="text-warning" data-toggle="modal" data-target="#Register" href="#">Sign Up</a></span></div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal for Register -->
<div class="modal fade" id="Register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg">
        <h5 class="modal-title" id="exampleModalLongTitle">Register</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url('customer/save');?>">
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
</div>
  
<!-- Modal for forgot -->
<div class="modal fade" id="forgot" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg">
        <h5 class="modal-title" id="exampleModalLongTitle">Forgot password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
</div>
  
    