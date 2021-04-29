<div class="categories">
<h3>Categories</h3>
<?php foreach($all_published_category as $row){?>
  <h5><a href="<?= base_url('category/'.$row->category_slug);?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php echo $row->category_name;?></a></h5>
<?php }?>
</div>

<div class="categories">
 <?php include 'adsense.php'?>
</div>

<div class="categories">
<h3>Recent Post</h3>
<?php foreach($get_recent_post as $row){?>
  <h5><a href="<?= base_url('post/'.$row->post_slug);?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php echo $row->post_title;?></a></h5>
<?php }?>
</div>

<div class="categories">
 <?php include 'adsense.php'?>
</div>