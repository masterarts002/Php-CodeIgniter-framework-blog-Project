     
<div class="row justify-content-center">
   <div class="col-sm-10">
       <div class="row">
           <div class="col-sm-8">
            <?php if($get_post) : ?>
           <div class="pt-3">
            <div class="heading">
                <h3>You Are Searching For <b style="color:red"><?= $this->input->post('search');?></b></h3>
            </div>
           </div>
             <?php foreach($get_post as $row) : ?>
           <div class="row blog-post">
             <div class="col-sm-5">
               <a href="<?= base_url('post/'.$row->post_slug) ?>"><img class="img-fluid" src="<?= base_url('uploads/'.$row->post_image) ?>" alt=""></a>
             </div>
             <div class="col-sm-7">
               <a href="<?= base_url('post/'.$row->post_slug) ?>"><h3 class="text-capitalize"><?= $row->post_title ?></h3></a>
               <h5><i class="fa fa-user" aria-hidden="true"></i> <?= $row->user_name ?> 
               <span><i class="fa fa-bar-chart" aria-hidden="true"></i> <?= $row->post_view ?></span>
               <span><i class="fa fa-comments" aria-hidden="true"></i> <?php
               $this->db->select();
               $this->db->from('cmt_table');
               $this->db->where('cmt_post_id', $row->post_slug);
               $info = $this->db->get();
               echo $info->num_rows();
               ?></span></h5>
               <p><?php $today = word_limiter($row->post_data,50); echo strip_tags($today); ?></p>
               <a class="my-btn2" href="<?= base_url('post/'.$row->post_slug) ?>">Read More</a>
             </div>
           </div>
             <?php endforeach; ?>
             <?php else : ?>
            <div>
                <h3>No data Found For <b style="color:red"><?= $this->input->post('search');?></b></h3>
                <form  action="<?php echo base_url('search');?>" method="post">
                    <div class="input-group mb-2 mt-2">
                        <input type="text" name="search" class="form-control" placeholder="Product Search" required>
                        <div class="input-group-append">
                          <button class="btn btn-outline-warning" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>
            <?php endif; ?>
           </div>
           <div class="col-sm-4">
           <?php include 'sidebar.php'?>
           </div>
       </div>
       <div class="pt-3"></div>
       
        <?php  echo $this->pagination->create_links(); ?>
   </div>
</div>
