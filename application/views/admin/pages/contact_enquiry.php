<!-- start: Content -->
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url('dashboard')?>">Home</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Contact Enquiry</a></li>
    </ul>

    <div class="row-fluid">		
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Contact Enquiry</h2>
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
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Recived On</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>   
                    <tbody>
                        <?php 
                        $i=0;
                        foreach($contact_enquiry as $row){
                            $i++;
                            ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td style="text-transform: capitalize;"><?php echo $row->full_name?></td>
                            <td><?php echo $row->mubile_number?><br><a class="label label-success" href="tel:<?php echo $row->mubile_number?>">Call</a></td>
                            <td><?php echo $row->email?><br><a class="label label-success" href="mailto:<?php echo $row->email?>">Reply</a></td>
                            <td style="text-transform: capitalize;"><?php echo $row->about?></td>
                            <td style="text-transform: capitalize;"><?php $post_date = $row->sent_on; $now = unix_to_human($post_date); echo $now; ?></td>
                            <td style="text-transform: capitalize;"><?php echo $row->comment?></td>
                            <td style="text-transform: capitalize;">
                            <a class="btn btn-danger" href="<?php echo base_url('dashboard/delete_entry/'. $row->contact_id); ?>">
                            <i class="halflings-icon white trash"></i></a></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>            
            </div>
        </div><!--/span-->

    </div><!--/row-->



</div><!--/.fluid-container-->

<!-- end: Content -->