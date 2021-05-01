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
            <a href="<?php echo base_url('edit-footer-menu/'.$menu_footer_info_by_id->menu_id)?>">Edit Footer Link</a>
        </li>
    </ul>

    <div class="row-fluid">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Footer Link</h2>
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
                <form class="form-horizontal" action="<?php echo base_url('update-footer-menu/'.$menu_footer_info_by_id->menu_id)?>" method="post">
                    <fieldset>

                        <div class="control-group">
                            <label for="fileInput">Footer Link Name</label>
                            <div class="controls">
                                <input value="<?php echo $menu_footer_info_by_id->menu_title?>" class="span6 typeahead" name="menu_title" id="fileInput" type="text"/>
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="fileInput">Footer Link Name</label>
                            <div class="controls">
                                <input value="<?php echo $menu_footer_info_by_id->custom_menu_link?>" class="span6 typeahead" name="custom_menu_link" id="fileInput" type="text"/>
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