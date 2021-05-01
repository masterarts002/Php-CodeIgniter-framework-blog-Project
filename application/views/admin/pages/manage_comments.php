<!-- start: Content -->
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url('dashboard')?>">Home</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="<?php echo base_url('manage/menu')?>">Manage Menu</a></li>
    </ul>

    <div class="row-fluid">		
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Manage Menu</h2>
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
                            <th>Commenter Name</th>
                            <th>Website Link</th>
                            <th>Post Link</th>
                            <th>Comment</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>   
                    <tbody>
                        <?php 
                        $i=0;
                            foreach($get_all_comments as $row){
                                $i++;
                        ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td class="center"><?php echo $row->cmt_author;?></td>
                            <td class="center"><?php echo $row->cmt_url;?></td>
                            <td class="center"><a class="text-warning" href="<?php echo base_url('post/'.$row->cmt_post_id);?>">See Post</a></td>
                            <td class="center"><?php echo $row->cmt_email;?></td>
                            <td class="center"><?php echo $row->cmt_data;?></td>
                            <?php if($row->cmt_approved == 0) : ?>
                            <td><span class="label label-danger" style="background:red">Unpublished</span></td>
                            <?php else : ?>
                            <td><span class="label label-success">Published</span></td>
                            <?php endif; ?>
                                <td class="center">
                                    <?php if($row->cmt_approved == 0) : ?>
                                        <a class="btn btn-success" href="<?php echo base_url('published/cmt/' . $row->cmt_id); ?>">
                                            <i class="halflings-icon white thumbs-up"></i>  
                                        </a>
                                    <?php else : ?>
                                        <a class="btn btn-danger" href="<?php echo base_url('unpublished/cmt/' . $row->cmt_id); ?>">
                                            <i class="halflings-icon white thumbs-down"></i>  
                                        </a>  
                                    </a>
                                    <?php endif; ?>        
                                    <a class="btn btn-danger" href="<?php echo base_url('delete/cmt/' . $row->cmt_id); ?>">
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