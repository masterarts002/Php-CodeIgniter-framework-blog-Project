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
            <a href="<?php echo base_url('add/profile')?>">Add Profile</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Profile</h2>
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
                <form class="form-horizontal" action="<?php echo base_url('save/profile');?>" method="post" enctype="multipart/form-data">
                    <fieldset>

                        <div class="control-group">
                            <label for="fileInput">Astrologer Name</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="astrologer_name" id="fileInput" type="text"/>
                            </div>
                        </div>   
                        <div class="control-group">
                            <label for="textarea2">About Astrologer</label>
                            <div class="controls">
                                <textarea class="cleditor" name="about_astrologer" id="textarea2" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="fileInput">Astrologer Image</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="astrologer_image" id="fileInput" type="file"/>
                            </div>
                        </div> 
                        
                        <div class="control-group">
                            <label for="fileInput">Call Price ₹/Min</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="call_price" id="fileInput" type="number"/>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label for="fileInput">Astrologer Number</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="astrologer_number" id="fileInput" type="number"/>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label for="fileInput">Available Time</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="available_time" id="fileInput" type="text"/>
                            </div>
                        </div> 

                        <div class="control-group">
                            <label for="fileInput">Languages Known</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="languages_known" id="fileInput" type="text"/>
                            </div>
                        </div> 
                        
                        <div class="control-group">
                            <label for="fileInput">Speciality</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="speciality" id="fileInput" type="text">
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="fileInput">Experience</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="experience" id="fileInput" type="text">
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </fieldset>
                </form>   

            </div>
        </div><!--/span-->

    </div><!--/row-->


</div><!--/.fluid-container-->

<!-- end: Content -->