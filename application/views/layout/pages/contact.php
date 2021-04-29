
<div class="row justify-content-center">
   <div class="col-md-10">
       <div class="row">
           <div class="col-sm-8 col-xs-12 contact-form">
              <div class="">
                <h1>Contact Us</h1>
                <?php include 'adsense_responsive.php'?>
                <p><?= $get_identity->contact_description ?></p>
              </div><hr>
             <div class="row">
               <div class="col-md-7">
                 <h1><?= $get_identity->contact_title ?></h1>
                 <p><?= $get_identity->contact_subtitle ?></p>
                 <?php  if($error=$this->session->flashdata('message')):  ?>
                         <div class="row">
                             <div class="col-lg-12">
                                 <div class="alert alert-success">
                                     <?= $error; ?>
                                 </div>
                             </div>
                         </div>
                         <?php endif; ?>
                 <form class="text-left" action="<?php echo base_url('layout/submit');?>" method="post">
                   <div class="form-group">
                     <input type="text" class="form-control" name="full_name" value="<?= set_value('full_name'); ?>" placeholder="Full Name">
                   </div>
                   <div class="form-group">
                     <input type="email" class="form-control" name="email" value="<?= set_value('email'); ?>" placeholder="Email">
                   </div>
                   <div class="form-group">
                     <input type="number" class="form-control" name="mubile_number" value="<?= set_value('mubile_number'); ?>" placeholder="Enter Contact Number">
                   </div>
                   <select class="custom-select my-1 mr-sm-2" name="about" >
                     <option selected value="E-commerce">E-commerce</option>
                     <option value="Blog">Blog</option>
                     <option value="Business static website">Business static website</option>
                     <option value="Shops">Shops</option>
                     <option value="Landing page for marketing">Landing page for marketing</option>
                     <option value="Lokking For guest post">Lokking For guest post</option>
                     <option value="Others">Others</option>
                   </select>  
                   <div class="form-group">
                     <textarea type="text" class="form-control" name="comment"  placeholder="Message (optional)"><?= set_value('describe_issues'); ?></textarea>
                   </div>
                   <button type="submit" class="my-btn2 btn-block">Submit</button>
                 </form>
                </div>
                
                <div class="col-md-5 address pt-2">
                  <h4><i class="fa fa-map-marker text-primary" aria-hidden="true"></i> Address</h4><hr>
                  <p class='pl-4'><?= $get_identity->company_location ?></p><hr>
                  <h4><i class="fa fa-envelope-o text-primary" aria-hidden="true"></i> Email</h4>
                  <p class='pl-4'><a class="text-dark" href="mailto:<?= $get_identity->company_email ?>"><?= $get_identity->company_email ?></a></p><hr>
                  <h4><i class="fa fa-phone text-primary" aria-hidden="true"></i> Call Us</h4>
                  <p class='pl-4'><a class="text-dark" href="tel:<?= $get_identity->company_number ?>"><?= $get_identity->company_number ?></a></p><hr>
                  <a href="<?= $get_identity->company_facebook ?>"><img width="30" style="margin: 5px" src="<?= base_url('assets/layout/images/facebook.png'); ?>" alt=""></a>
                  <a href="<?= $get_identity->company_twitter ?>"><img width="30" style="margin: 5px" src="<?= base_url('assets/layout/images/twitter.png'); ?>" alt=""></a>
                  <a href="<?= $get_identity->site_insta_link ?>"><img width="30" style="margin: 5px" src="<?= base_url('assets/layout/images/instagram.png'); ?>" alt=""></a>
                </div>
             </div>
           </div>
           <?php include 'adsense_responsive.php'?>
           <div class="col-sm-4">
               <?php include 'sidebar.php' ?>
           </div>
       </div>
   </div>
</div>
