<!-- start: Content -->
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url('dashboard')?>">Home</a>
            <i class="icon-angle-right"></i> 
        </li>
        <li>
            <i class="icon-edit"></i>
            <a href="<?php echo base_url('edit/post/'.$page_info_by_id->page_id)?>">edit post</a>
        </li>
    </ul>

    <div class="row-fluid">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit post</h2>
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
                <p><?php echo $this->session->flashdata('message');?></p>
            </div>
            <div class="box-content">
                <form name="formName" class="form-horizontal" action="<?php echo base_url('update/page/'.$page_info_by_id->page_id);?>" method="post" enctype="multipart/form-data">
                    <fieldset>

                        <div class="control-group">
                            <label for="fileInput">Page Title</label>
                            <div class="controls">
                                <input class="span6 typeahead" value="<?php echo $page_info_by_id->page_title;?>" name="page_title" id="fileInput" type="text"/>
                            </div>
                        </div>  

                        <div class="control-group">
                            <label for="textarea2">Edit Page</label>
                            <div class="controls">
                                <textarea class="ckeditor" id ="editor1" name="page_data">
                                    <?php echo $page_info_by_id->page_data;?>
                                </textarea>
                                <script>CKEDITOR.replace( 'editor1', {extraPlugins: 'codesnippet',codeSnippet_theme: 'monokai_sublime'} );</script>
                            </div>
                        </div>

                        
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <button type="reset" class="btn">Cancel</button>
                        </div>
                    </fieldset>
                </form>   

            </div>
        </div><!--/span-->

    </div><!--/row-->


</div><!--/.fluid-container-->

<!-- end: Content -->

<script>
document.getElementById('publication_status').value = <?php echo $post_info_by_id->pstatus;?>;
document.formName.post_feature.value=<?php echo $post_info_by_id->post_feature;?>;
document.getElementById('post_brand').value = <?php echo $post_info_by_id->post_brand;?>;
document.getElementById('post_category').value = <?php echo $post_info_by_id->post_category;?>;
</script>