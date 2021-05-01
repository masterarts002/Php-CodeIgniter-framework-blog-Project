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
            <a href="<?php echo base_url('edit/profile/'.$profile_info_by_id->astrologer_id)?>">edit profile</a>
        </li>
    </ul>

    <div class="row-fluid">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit profile</h2>
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
                <form name="formName" class="form-horizontal" action="<?php echo base_url('update/profile/'.$profile_info_by_id->astrologer_id);?>" method="post" enctype="multipart/form-data">
                    <fieldset>
                    <div class="control-group">
                            <label for="fileInput">Astrologer Name</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="astrologer_name" value="<?= $profile_info_by_id->astrologer_name; ?>" id="fileInput" type="text"/>
                            </div>
                        </div>   
                        <div class="control-group">
                            <label for="textarea2">About Astrologer</label>
                            <div class="controls">
                                <textarea class="cleditor" name="about_astrologer" id="textarea2" rows="4"><?= $profile_info_by_id->about_astrologer; ?></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="fileInput">Astrologer Image</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="astrologer_image" value="<?= $profile_info_by_id->astrologer_image; ?>" id="fileInput" type="file"/>
                            </div>
                        </div> 

                        <div class="control-group">
                            <div class="controls">
                                <img src="<?php echo base_url('uploads/'.$profile_info_by_id->astrologer_image);?>" style="width:200px;height:200px"/>
                            </div>
                        </div> 
                        
                        <div class="control-group">
                            <label for="fileInput">Call Price ₹/Min</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="call_price" value="<?= $profile_info_by_id->call_price; ?>" id="fileInput" type="number"/>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label for="fileInput">Astrologer Number</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="astrologer_number" value="<?= $profile_info_by_id->astrologer_number ;?>" id="fileInput" type="number"/>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label for="fileInput">Available Time</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="available_time" value="<?= $profile_info_by_id->available_time; ?>" id="fileInput" type="text"/>
                            </div>
                        </div> 

                        <div class="control-group">
                            <label for="fileInput">Languages Known</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="languages_known" value="<?= $profile_info_by_id->languages_known; ?>" id="fileInput" type="text"/>
                            </div>
                        </div> 
                        
                        <div class="control-group">
                            <label for="fileInput">Speciality</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="speciality" value="<?= $profile_info_by_id->speciality; ?>" id="fileInput" type="text">
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="fileInput">Experience</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="experience" value="<?= $profile_info_by_id->experience; ?>" id="fileInput" type="text">
                            </div>
                        </div>
                        
                        
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Save changes</button>\
                        </div>
                    </fieldset>
                </form>   

            </div>
        </div><!--/span-->

    </div><!--/row-->


</div><!--/.fluid-container-->

<!-- end: Content -->

<script>
document.getElementById('publication_status').value = <?php echo $profile_info_by_id->pstatus;?>;
document.formName.profile_feature.value=<?php echo $profile_info_by_id->profile_feature;?>;
document.getElementById('profile_brand').value = <?php echo $profile_info_by_id->profile_brand;?>;
document.getElementById('profile_category').value = <?php echo $profile_info_by_id->product_category;?>;
</script>