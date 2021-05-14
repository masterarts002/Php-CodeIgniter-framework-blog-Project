
<div class="row justify-content-center">
   <div class="col-md-10">
       <div class="row">
           <div class="col-md-8">
           <div class="single-post">
               <a href="<?= base_url('post/'.$get_single_post->post_slug) ?>"><img class="img-fluid" src="<?= base_url('uploads/'.$get_single_post->post_image) ?>" alt=""></a>
               <div class="pt-3"></div>
               <a href="<?= base_url('post/'.$get_single_post->post_slug) ?>"><h3 class="text-capitalize"><?= $get_single_post->post_title ?></h3></a>
               <div class="d-flex justify-content-between">
                <span><?php $post_date = $get_single_post->published_date;
                $now = date(DATE_RFC850, $post_date);
                echo $now;?></span>
               <span><i class="fa fa-bar-chart" aria-hidden="true"></i> Post Views: <?= $get_single_post->post_view ?></span>
               </div>
               <?php include 'adsense_artical.php'?>
               <p><?= $get_single_post->post_data; ?></p>
               <div class="d-flex justify-content-between">
               <span><i class="fa fa-user" aria-hidden="true"></i> <?= $get_single_post->post_author ?></span> 
               <span><i class="fa fa-comments" aria-hidden="true"></i> <?= $get_total_comments ?> Comments</span>
               </div>
               <div class="social">
                 <!-- Facebook -->
                 <a  href="http://www.facebook.com/sharer.php?u=<?= base_url('post/'.$this->uri->segment(2)) ?>" target="_blank"><i class="fa fa-facebook-square shrink-on-hover" aria-hidden="true"></i></a>                 

                 <!-- Twitter -->
                 <a href="http://twitter.com/share?url=<?= base_url('post/'.$this->uri->segment(2)) ?>&text=Simple Share Buttons&hashtags=simplesharebuttons" target="_blank"><i class="fa fa-twitter-square shrink-on-hover" aria-hidden="true"></i></a>                 

                 <!-- Google+ -->
                 <a href="https://plus.google.com/share?url=<?= base_url('post/'.$this->uri->segment(2)) ?>" target="_blank"><i class="fa fa-google-plus-square shrink-on-hover" aria-hidden="true"></i></a>               

                 <!-- Reddit -->
                 <a href="http://reddit.com/submit?url=<?= base_url('post/'.$this->uri->segment(2)) ?>&title=Simple Share Buttons" target="_blank"><i class="fa fa-reddit-square shrink-on-hover" aria-hidden="true"></i></a>                 

                 <!-- LinkedIn -->
                 <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?= base_url('post/'.$this->uri->segment(2)) ?>" target="_blank"><i class="fa fa-linkedin-square shrink-on-hover" aria-hidden="true"></i></a>         

                 <!-- Email -->
                 <a href="mailto:?Subject=Simple Share Buttons&Body=I%20saw%20this%20and%20thought%20of%20you!%20 <?= base_url('post/'.$this->uri->segment(2)) ?>"><i class="fa fa-envelope shrink-on-hover" aria-hidden="true"></i></a>

                 <a href="https://api.whatsapp.com/send?text=<?= base_url('post/'.$this->uri->segment(2)) ?>"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>

               </div>
               <?php include 'adsense_artical.php'?>
           </div>
           <div class="pb-3"></div>
              <?php  if($error=$this->session->flashdata('message')):  ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-success">
                            <?= $error; ?>
                        </div>
                    </div>
                </div>
              <?php endif; ?>
            <form class="text-left" action="<?php echo base_url('layout/addcmt');?>" method="post">

              <div class="form-group">
                <input type="text" class="form-control" name="cmt_author" placeholder="John mdith">
                <input type="hidden" class="form-control" name="cmt_post_id" value="<?= $get_single_post->post_slug ?>">
                <input type="hidden" class="form-control" name="post_title" value="<?= $get_single_post->post_title ?>">
              </div>

              <div class="form-group">
                <input type="email" class="form-control" name="cmt_email" placeholder="name@example.com">
              </div>

              <div class="form-group">
                <input type="text" class="form-control" name="cmt_url" placeholder="https://example.com">
              </div>
              
              <div class="form-group">
                <textarea class="form-control" name="cmt_data" rows="3"></textarea>
              </div>

              <button class="my-btn2" type="submit">Post Comment</button>
            </form>
            <div class="cmt">
            <?php include 'adsense_artical.php'?>
               <?php foreach($get_comments as $row) : ?>
               <div class="pt-3"></div>
               <a class="text-primary" href="<?= $row->cmt_url ?>"><?= $row->cmt_author ?></a><br>
               <span class="text-primary"><?php $post_date = $row->cmt_on;
                $now = date(DATE_RFC850, $post_date);
                echo $now;?></span>
                <p><?= $row->cmt_data ?></p>
                <div class="rep">
                   <?php
                   $this->db->select();
                   $this->db->from('rep_table');
                   $this->db->where('rep_cmt_id', $row->cmt_id);
                   $this->db->order_by('rep_on', 'DESC');
                   $info = $this->db->get();
                   $get_comments = $info->result();
                   if($get_comments){echo'Reply by Author';}
                   foreach($get_comments as $rows) : ?>
                   <div class="pt-3"></div>
                   <a class="text-primary" href="#"><?= $rows->admin_id ?></a><br>
                   <span class="text-primary"><?php $post_date = $rows->rep_on;
                   $now = date(DATE_RFC850, $post_date);
                   echo $now;?></span>
                   <p><?= $rows->rep_data ?></p>
                   <?php endforeach; ?>
                </div>
                <?php if($this->session->userdata('admin_id')) : ?>
                <a class="btn btn-primary" data-toggle="collapse" href="#<?= $row->cmt_id ?>" role="button" aria-expanded="false" aria-controls="collapseExample" >Reply</a>
                <div class="collapse" id="<?= $row->cmt_id ?>">
                  <div class="card card-body">
                  <form class="text-left" action="<?php echo base_url('reply/'.$row->cmt_id);?>" method="post">

                    <div class="form-group">
                      <input type="hidden" class="form-control" name="cmt_post_id" value="<?= $get_single_post->post_slug ?>">
                      <input type="hidden" class="form-control" name="post_title" value="<?= $get_single_post->post_title ?>">
                      <input type="hidden" class="form-control" name="rep_cmt_id" value="<?= $row->cmt_id ?>">
                    </div>                 

                    <div class="form-group">
                      <textarea class="form-control" name="rep_data" rows="3"></textarea>
                    </div>                    

                    <button class="my-btn2" type="submit">Reply</button>
                  </form>
                  </div>
                </div>
                <?php endif; ?>
                <hr>
                <?php endforeach; ?>
                <?php include 'adsense_artical.php'?>
            </div>
           </div>
           <div class="col-md-4">
               <?php include 'sidebar.php' ?>
           </div>
       </div>
   </div>
</div>