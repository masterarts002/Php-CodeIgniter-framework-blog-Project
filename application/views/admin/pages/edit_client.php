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
            <a href="<?php echo base_url('edit/image/'.$client_info_by_id->client_id)?>">Edit image</a>
        </li>
    </ul>

    <div class="row-fluid">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit image</h2>
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
                <form class="form-horizontal" action="<?php echo base_url('update/client/'.$client_info_by_id->client_id);?>" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <div class="control-group">
                            <label for="fileInput">Client Link</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="client_link" id="fileInput" type="text" value="<?php echo $client_info_by_id->client_link;?>"/>
                            </div>
                        </div>

                         <div class="control-group">
                            <label for="fileInput">Image</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="image" type="file"/>
                                <input class="span6 typeahead" value="<?php echo $client_info_by_id->image;?>" name="delete_image" type="hidden"/>
                            </div>
                        </div>
                        
                        
                         <div class="control-group">
                            <label for="fileInput">Image</label>
                            <div class="controls">
                                <img style="width:400px;height:60px" src="<?php echo base_url('uploads/'.$client_info_by_id->image);?>"/>
                            </div>
                        </div>
                        
                         
                        
                        <div class="form-actions">
                            <button type="submit" id="save_category" class="btn btn-primary">Save changes</button>
                            <button type="reset" class="btn">Cancel</button>
                        </div>
                    </fieldset>
                </form>   

            </div>
        </div><!--/span-->

    </div><!--/row-->

    
    
</div><!--/.fluid-container-->

<!-- end: Content -->