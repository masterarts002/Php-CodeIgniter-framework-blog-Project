<!-- start: Content -->
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url('dashboard')?>">Home</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="<?php echo base_url('manage/post')?>">Manage Post</a></li>
    </ul>

    <div class="row-fluid">		
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Manage Post</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            
            <style type="text/css">
                #result{color:red;padding: 5px}
                #result p{color:red}
            </style>
            <div id="result">
                <p><?php echo $this->session->flashdata('message'); ?></p>
            </div>
            
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                        <tr>
                            <th>Sr.</th>
                            <th>Post Title</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Keywords</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>   
                    <tbody>
                        <?php 
                        $i=0;
                        foreach($get_all_post as $single_post){
                            $i++;
                        ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td class="center"><?php echo $single_post->post_title;?><br>
                            <a style="color:blue; font-weight: 600" href="<?= base_url('post/'.$single_post->post_slug) ?>" target="_blank"><small>View Post</small></a>
                            </td>
                            <td class="center"><?php echo $single_post->post_author;?></td>
                            <td class="center"><?php echo $single_post->category_name;?></td>
                            <td class="center"><?php echo $single_post->post_keywords;?></td>
                            <td class="center">
                                <?php if ($single_post->pstatus == 1) { ?>
                                    <span class="label label-success">Published</span>
                                    <?php 
                                    echo br(1); 
                                    $post_date = $single_post->published_date;
                                    $now = unix_to_human($post_date);
                                    echo $now;
                                    ?>
                                <?php } else {
                                    ?>
                                    <span class="label label-danger" style="background:red">Unpublished</span>
                                    <?php 
                                    echo br(1); 
                                    $post_date = $single_post->published_date;
                                    $now = unix_to_human($post_date);
                                    echo $now;
                                    ?>
                                    <?php }
                                ?>
                            </td>
                           <td class="center">
                                    <?php if ($single_post->pstatus == 0) { ?>
                                        <a class="btn btn-success" href="<?php echo base_url('published/post/' . $single_post->post_id); ?>">
                                            <i class="halflings-icon white thumbs-up"></i>  
                                        </a>
                                    <?php } else {
                                        ?>
                                        <a class="btn btn-danger" href="<?php echo base_url('unpublished/post/' . $single_post->post_id); ?>">
                                            <i class="halflings-icon white thumbs-down"></i>  
                                        </a>
                                        <?php }
                                    ?>

                                    <a class="btn btn-info" href="<?php echo base_url('edit/post/' . $single_post->post_id); ?>">
                                        <i class="halflings-icon white edit"></i>  
                                    </a>
                                    <a class="btn btn-danger" href="<?php echo base_url('delete/post/' . $single_post->post_id); ?>">
                                        <i class="halflings-icon white trash"></i> 
                                    </a>
                                </td>
                        </tr>
                        <?php }?>
                        
                    </tbody>
                </table>            
            </div>
        </div><!--/span-->

    </div><!--/row-->



</div><!--/.fluid-container-->

<!-- end: Content -->