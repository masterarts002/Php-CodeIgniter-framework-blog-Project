<div class="row">
   <div class="col-md-12">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <?php foreach($get_all_slider_post as $row): ?>
             <?php if($row->position === 'first') : ?>   
              <div class="carousel-item active">
              <?php else : ?>
              <div class="carousel-item">
              <?php endif; ?>
              <img class="img-fluid d-block w-100" src="<?= base_url('uploads/'.$row->slider_image) ?>" alt="First slide">
              <div class="overlay">
               </div>
              <div class="carousel-caption">
                 <h1><?= $row->slider_title ?></h1>
                 <div class="fadingEffect"></div>
                 <p><?= $row->slider_sub_title ?></p>
                 <a class="my-btn" href="<?= $row->slider_btn_link ?>"><?= $row->slider_btn_text ?></a>
               </div>
            </div>
            <?php endforeach; ?>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
   </div>
</div>



<div class="row justify-content-center">
  <div class="col-md-3">
   <?php include 'adsense_virtical.php'?>
  </div>
  <div class="col-md-6">
    <div class="row form2">
      <div class="col-md-6">
        <h1>Excellence Record</h1>
        <p>Design & Development of Static/Corporate Website and E-commerce Stores</p>
        <div class="featured">
          <span class="eael-feature-list-icon">
           <i class="fa fa-bar-chart" aria-hidden="true"></i>
				  </span>
          <h4>35+ Projects Done</h4>
        </div>
        <div class="featured">
          <span class="eael-feature-list-icon">
           <i class="pl-1 fa fa-user" aria-hidden="true"></i>
				  </span>
          <h4>50+ Happy Clients</h4>
        </div>
        <div class="featured">
          <span class="eael-feature-list-icon">
           <i class="fa fa-users" aria-hidden="true"></i>
				  </span>
          <h4>3+ Team Experts</h4>
        </div>
      </div>
      <div class="col-md-6 form">
        <h1>Get Free Quote</h1>
        <p>We can develop your website as per your requirement and budget.</p>
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
            <input type="text" class="form-control" name="email" value="<?= set_value('email'); ?>" placeholder="Email">
          </div>
          <div class="form-group">
            <input type="number" class="form-control" name="mubile_number" value="<?= set_value('mubile_number'); ?>" placeholder="Enter Contact Number">
          </div>
          <select class="custom-select my-1 mr-md-2" name="about" value="<?= set_value('about'); ?>">
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
    </div>
  </div>

  <div class="col-md-3">
  <?php include 'adsense_virtical.php'?>
  </div>
</div>

<div class="pb-3"></div>

<div class="row row3">
  <div class="col-md-12 text-center">
    <h1 class="text-capitalize">We build your website beautiful and fully responsive.</h1>
    <p>You will find our experts knowledgeable about customer needs and ready to help reach customer goals, and most importantly, our quick responsiveness to customer queries has won a lot of consumer appreciation.
      Our mission is to ensure complete customer satisfaction and to provide our customers with flexible and cost effective website designing services, including all graphical needs like logo design, flash intros, flash website templates, and custom website templates. custom website templates.</p>
  </div>
</div>

<div class="row client text-center justify-content-center" style="background-color: white">
  <div class="col-md-10">
    <h3>Development</h3>
    <h1>Our Clients</h1>
    <div class="row">
    <?php foreach($all_clients as $row) : ?>
      <div class="col-md-3 col-6">
        <a href="<?= $row->client_link ?>"><img class="img-fluid" src="<?= base_url('uploads/'.$row->image) ?>" alt=""></a>
      </div>
      <?php endforeach; ?>
    </div>
    <?php include 'adsense_responsive.php'?>
  </div>
</div>

<div class="row row2">
  <div class="col-md-12">
    <h1>We Can Build Your Website</h1><h4>So what are you waiting for?</h4>
    <a class="my-btn2" href="<?= base_url('contact Us') ?>">Get Started Now</a>
  </div>
</div>

<div class="row post justify-content-center">
  <div class="col-md-10">
    <h3 class="text-center">We are here for</h3>
    <h1 class="text-center">Teach You Somthing for free</h1>
    <?php include 'adsense_responsive.php'?>
    <div class="row">
    <?php foreach($get_post as $row) : ?>
      <div class="col-md-4">
        <a href="<?= base_url('post/'.$row->post_slug) ?>"><img class="img-fluid" src="<?= base_url('uploads/'.$row->post_image) ?>" alt=""></a>
      </div>
      <div class="col-md-8">
        <a href="<?= base_url('post/'.$row->post_slug) ?>"><h3><?= $row->post_title ?></h3></a>
        <h5><i class="fa fa-user" aria-hidden="true"></i> <?= $row->user_name ?> 
        <span><i class="fa fa-eye" aria-hidden="true"></i> <?= $row->post_view ?></span>
        <span><i class="fa fa-comments" aria-hidden="true"></i> <?php
               $this->db->select();
               $this->db->from('cmt_table');
               $this->db->where('cmt_post_id', $row->post_slug);
               $info = $this->db->get();
               echo $info->num_rows();
               ?>
        </span></h5>
        <p><?php $today = word_limiter($row->post_data,90); echo strip_tags($today); ?></p>
        <a class="my-btn2" href="<?= base_url('post/'.$row->post_slug) ?>">Read More</a>
      </div>
      <?php include 'adsense_artical.php'?>
      <?php endforeach; ?>
    </div>
  </div>
</div>