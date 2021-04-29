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
            <a href="<?php echo base_url('theme/option')?>">Add Images</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Images</h2>
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
                <form class="form-horizontal" action="<?php echo base_url('save/client')?>" method="post" enctype="multipart/form-data">
                    <fieldset>
                        
                        <div class="control-group">
                            <div class="controls">
                                <h2>Add Client</h2>
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="fileInput">Client Link</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="client_link" id="fileInput" type="text" placeholder="https//example.com"/>
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="fileInput">client logo</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="image" id="fileInput" type="file"/>
                            </div>
                        </div> 
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Add Client</button>
                            <button type="reset" class="btn">Cancel</button>
                        </div>
                    </fieldset>
                </form>   

            </div>
        </div><!--/span-->

    </div><!--/row-->


</div><!--/.fluid-container-->

<!-- end: Content -->