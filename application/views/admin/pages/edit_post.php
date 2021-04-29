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
            <a href="<?php echo base_url('edit/post/'.$post_info_by_id->post_id)?>">edit post</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
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
                <form name="formName" class="form-horizontal" action="<?php echo base_url('update/post/'.$post_info_by_id->post_id);?>" method="post" enctype="multipart/form-data">
                    <fieldset>

                        <div class="control-group">
                            <label for="fileInput">Post Title</label>
                            <div class="controls">
                                <input class="span6 typeahead" value="<?php echo $post_info_by_id->post_title;?>" name="post_title" id="fileInput" type="text"/>
                            </div>
                        </div>  

                        <div class="control-group">
                            <label for="textarea2">Edit Post</label>
                            <div class="controls">
                                <textarea class="ckeditor" id ="editor1" name="post_data">
                                    <?php echo $post_info_by_id->post_data;?>
                                </textarea>
                                <script>CKEDITOR.replace( 'editor1', {extraPlugins: 'codesnippet',codeSnippet_theme: 'monokai_sublime'} );</script>
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="fileInput">Post Image</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="post_image" id="fileInput" type="file"/>
                                <input class="span6 typeahead" name="post_delete_image" value="<?php echo base_url('uploads/'.$post_info_by_id->post_image);?>" type="hidden"/>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <div class="controls">
                                <img src="<?php echo base_url('uploads/'.$post_info_by_id->post_image);?>" style="width:500px;height:200px"/>
                            </div>
                        </div> 
                        
                        <div class="control-group">
                            <label for="fileInput">Post Keywords (optional)</label>
                            <div class="controls">
                                <textarea class="span6 typeahead" name="post_keywords" id="textarea2" rows="3"><?php echo $post_info_by_id->post_keywords;?></textarea>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label for="fileInput">Post Description (optional)</label>
                            <div class="controls">
                                <textarea class="span6 typeahead" name="post_description" id="textarea2" rows="3"><?php echo $post_info_by_id->post_description;?></textarea>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label for="fileInput">post Category</label>
                            <div class="controls">
                                <select id="post_category" name="post_category">
                                    <option value="<?php echo $post_info_by_id->post_category;?>"><?php echo $post_info_by_id->category_name;?></option>
                                    <?php foreach($all_published_category as $single_category){?>
                                    <option value="<?php echo $single_category->category_slug;?>"><?php echo $single_category->category_name;?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div> 
                        
                        <div class="control-group">
                            <label for="textarea2">Publication Status</label>
                            <div class="controls">
                                <select id="publication_status" name="publication_status">
                                    <option value="1">Published</option>
                                    <option value="0">UnPublished</option>
                                </select>
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