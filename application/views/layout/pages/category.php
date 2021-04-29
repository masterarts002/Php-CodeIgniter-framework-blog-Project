<div class="row justify-content-center">
   <div class="col-md-10">
       <div class="row">
           <div class="col-md-8">
             <?php foreach($get_post as $row) : ?>
           <div class="row blog-post">
             <div class="col-md-5">
               <a href="<?= base_url('post/'.$row->post_slug) ?>"><img class="img-fluid" src="<?= base_url('uploads/'.$row->post_image) ?>" alt=""></a>
             </div>
             <div class="col-md-7">
               <a href="<?= base_url('post/'.$row->post_slug) ?>"><h3 class="text-capitalize"><?= $row->post_title ?></h3></a>
               <h5><i class="fa fa-user" aria-hidden="true"></i> <?= $row->user_name ?> 
               <span><i class="fa fa-eye" aria-hidden="true"></i> <?= $row->post_view ?></span>
               <span><i class="fa fa-comments" aria-hidden="true"></i> 3</span></h5>
               <p><?php $today = word_limiter($row->post_data,50); echo strip_tags($today); ?></p>
               <a class="my-btn2" href="<?= base_url('post/'.$row->post_slug) ?>">Read More</a>
             </div>
           </div>
           <div class="blog-post">
           <?php include 'adsense_artical.php'?>
           </div>
             <?php endforeach; ?>
           </div>
           <div class="col-md-4">
           <?php include 'sidebar.php'?>
           </div>
       </div>
       <div class="pt-3"></div>
       
        <?php  echo $this->pagination->create_links(); ?>
       </span>
   </div>
</div>