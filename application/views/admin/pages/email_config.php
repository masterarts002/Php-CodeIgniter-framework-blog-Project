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
            <a href="<?php echo base_url('email-config')?>">Manage Email Config</a>
        </li>
    </ul>

    <div class="row-fluid">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Manage Email Config</h2>
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
                <form class="form-horizontal" action="<?php echo base_url('update/email-config')?>" method="post">
                    <fieldset>

                        <div class="control-group">
                            <label >Email From</label>
                            <div class="controls">
                                <input value="<?php echo $EmailSetup->email_from ?>" class="span6 typeahead" name="email_from" id="fileInput" type="text"/>
                            </div>
                        </div>

                        <div class="control-group">
                            <label >Email To</label>
                            <div class="controls">
                                <input value="<?php echo $EmailSetup->email_to ?>" class="span6 typeahead" name="email_to" id="fileInput" type="text"/>
                            </div>
                        </div>
                                  
                        <div class="control-group">
                            <label >Protocol</label>
                            <div class="controls">
                                <input value="<?php echo $EmailSetup->protocol ?>" class="span6 typeahead" name="protocol" id="fileInput" type="text"/>
                            </div>
                        </div>
                                  
                        <div class="control-group">
                            <label >Smtp Host</label>
                            <div class="controls">
                                <input value="<?php echo $EmailSetup->smtp_host ?>" class="span6 typeahead" name="smtp_host" id="fileInput" type="text"/>
                            </div>
                        </div>
                                  
                        <div class="control-group">
                            <label >Smto Port</label>
                            <div class="controls">
                                <input value="<?php echo $EmailSetup->smtp_port ?>" class="span6 typeahead" name="smtp_port" id="fileInput" type="text"/>
                            </div>
                        </div>
                                  
                        <div class="control-group">
                            <label >Smtp User</label>
                            <div class="controls">
                                <input value="<?php echo $EmailSetup->smtp_user ?>" class="span6 typeahead" name="smtp_user" id="fileInput" type="text"/>
                            </div>
                        </div>
                                  
                        <div class="control-group">
                            <label >Smtp Password</label>
                            <div class="controls">
                                <input value="<?php echo $EmailSetup->smtp_pass ?>" class="span6 typeahead" name="smtp_pass" id="fileInput" type="password"/>
                            </div>
                        </div>
                                  
                        <div class="control-group">
                            <label >Mail Type</label>
                            <div class="controls">
                                <input value="<?php echo $EmailSetup->mailtype ?>" class="span6 typeahead" name="mailtype" id="fileInput" type="text"/>
                            </div>
                        </div>
                                  
                        <div class="control-group">
                            <label >Charset</label>
                            <div class="controls">
                                <input value="<?php echo $EmailSetup->charset ?>" class="span6 typeahead" name="charset" id="fileInput" type="text"/>
                            </div>
                        </div>
                                  
                        <div class="control-group">
                            <label >Wordwrap</label>
                            <div class="controls">
                                <input value="<?php echo $EmailSetup->wordwrap ?>" class="span6 typeahead" name="wordwrap" id="fileInput" type="text"/>
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