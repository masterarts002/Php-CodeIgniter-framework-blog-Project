<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- fontawesome CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Site CSS -->
    <link href="<?php echo base_url() ?>assets/web/css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="<?php echo base_url() ?>assets/web/css/menu.css" rel="stylesheet" type="text/css" media="all"/>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <title>Astro Megic</title>
  </head>
  <body>
<!-- on failed -->
<div class="row  justify-content-center">
    <div class="col-sm-6 mt-5">
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
                <h4>Forgot your Dashboard password?</h4>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url('user/send-otp');?>" method="post">
                <div class="form-group">
                    <Label for="">Enter Your Registered Email ID to ResetPassword</Label>
                        <input type="email" name="user_email" placeholder="Email ID" class="form-control" value="<?php echo set_value('user_email'); ?>" />
                </div>
                <div class="form-group">
                        <input class="my-btn" type="submit" value="Get OTP">
                </div>
                </form>
            </div>    
        </div>
    </div>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>    