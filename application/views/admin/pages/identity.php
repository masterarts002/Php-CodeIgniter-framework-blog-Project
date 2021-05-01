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
            <a href="<?php echo base_url('theme/option')?>">Add Theme Option</a>
        </li>
    </ul>

    <div class="row-fluid">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Theme Option</h2>
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
                <form class="form-horizontal" action="<?php echo base_url('save/site-identity')?>" method="post" enctype="multipart/form-data">
                    <fieldset>
                        
                        <div class="control-group">
                            <div class="controls">
                                <h2>Header Options</h2>
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="fileInput">Site Titel</label>
                            <div class="controls">
                                <input class="span6 typeahead" value="<?php echo $get_identity->site_title;?>" name="site_title" id="fileInput" type="text"/>
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="fileInput">Site Logo</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="site_logo" id="fileInput" type="file"/>
                                <input name="delete_logo" value="<?php echo $get_identity->site_logo;?>"  type="hidden"/>
                            </div>
                        </div> 
                        <div class="control-group">
                            <div class="controls">
                                <img src="<?php echo base_url('uploads/');?><?php echo $get_identity->site_logo;?>" style="width:450px;height:100px"/>
                            </div>
                        </div> 
                        
                        <div class="control-group">
                            <label for="fileInput">Site Favicon</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="site_favicon" id="fileInput" type="file"/>
                                <input name="delete_favicon" value="<?php echo $get_identity->site_favicon;?>"  type="hidden"/>
                            </div>
                        </div> 
                        
                        <div class="control-group">
                            <div class="controls">
                                <img src="<?php echo base_url('uploads/');?><?php echo $get_identity->site_favicon;?>" style="width:100px;height:100px"/>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <div class="controls">
                                <h2>Footer Options</h2>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label for="fileInput">Copyright Info</label>
                            <div class="controls">
                                <input class="span6 typeahead" value="<?php echo $get_identity->site_copyright;?>" name="site_copyright" id="fileInput" type="text"/>
                            </div>
                        </div> 
                        
                        
                        
                        <div class="control-group">
                            <label for="fileInput">Site keywprds</label>
                            <div class="controls">
                                <input class="span6 typeahead" value="<?php echo $get_identity->site_keywords;?>" name="site_keywords" id="fileInput" type="text"/>
                            </div>
                        </div> 
                        
                        
                        <div class="control-group">
                            <label for="fileInput">Site Description</label>
                            <div class="controls">
                                <input class="span6 typeahead" value="<?php echo $get_identity->site_desc;?>" name="site_desc" id="fileInput" type="text"/>
                            </div>
                        </div> 
                        
                        
                        
                        <div class="control-group">
                            <div class="controls">
                                <h2>Contact Page Information</h2>
                            </div>
                        </div> 
                        
                        
                        <div class="control-group">
                            <label for="fileInput">Contact Title</label>
                            <div class="controls">
                                <input class="span6 typeahead" value="<?php echo $get_identity->contact_title;?>" name="contact_title" id="fileInput" type="text"/>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label for="fileInput">Contact SubTitle</label>
                            <div class="controls">
                                <input class="span6 typeahead" value="<?php echo $get_identity->contact_subtitle;?>" name="contact_subtitle" id="fileInput" type="text"/>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label for="fileInput">Contact Description</label>
                            <div class="controls">
                                <textarea class="cleditor" name="contact_description" cols="30" rows="8">
                                    <?php echo $get_identity->contact_description;?>

                                </textarea>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <div class="controls">
                                <h2>Company Information </h2>
                            </div>
                        </div> 
                        
                        <div class="control-group">
                            <label for="fileInput">Company Location</label>
                            <div class="controls">
                                <textarea name="company_location" rows="4">
                                    <?php echo $get_identity->company_location;?>
                                </textarea>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label for="fileInput">Company Phone Number</label>
                            <div class="controls">
                                <input class="span6 typeahead" value="<?php echo $get_identity->company_number;?>" name="company_number" id="fileInput" type="text"/>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label for="fileInput">Company Email Address</label>
                            <div class="controls">
                                <input class="span6 typeahead" value="<?php echo $get_identity->company_email;?>" name="company_email" id="fileInput" type="text"/>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label for="fileInput">Company Facebook</label>
                            <div class="controls">
                                <input class="span6 typeahead" value="<?php echo $get_identity->company_facebook;?>" name="company_facebook" id="fileInput" type="text"/>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label for="fileInput">Company Twitter</label>
                            <div class="controls">
                                <input class="span6 typeahead" value="<?php echo $get_identity->company_twitter;?>" name="company_twitter" id="fileInput" type="text"/>
                            </div>
                        </div>

                        
                        <div class="control-group">
                            <label for="fileInput">Instagram Link</label>
                            <div class="controls">
                                <input class="span6 typeahead" value="<?php echo $get_identity->site_insta_link;?>" name="site_insta_link" id="fileInput" type="text"/>
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