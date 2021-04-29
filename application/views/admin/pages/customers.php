<!-- start: Content -->
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url('dashboard')?>">Home</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Customers Details</a></li>
    </ul>

    <div class="row-fluid sortable">		
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Customers Details</h2>
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
                            <th>Customer Name</th>
                            <th>Customer Number</th>
                            <th>Customer Email</th>
                            <th>Customer Address</th>
                            <th>Customer City</th>
                            <th>Customer PinCode</th>
                            <th>Customer State</th>
                            <th>Action</th>
                        </tr>
                    </thead>   
                    <tbody>
                        <?php 
                        $i=0;
                        foreach($customers_info as $row){
                            $i++;
                            ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td style="text-transform: capitalize;"><?php echo $row->customer_name?></td>
                            <td><?php echo $row->customer_phone?></td>
                            <td><?php echo $row->customer_email?></td>
                            <td style="text-transform: capitalize;"><?php echo $row->customer_address?></td>
                            <td style="text-transform: capitalize;"><?php echo $row->customer_city?></td>
                            <td><?php echo $row->customer_zipcode?></td>
                            <td style="text-transform: capitalize;"><?php echo $row->customer_state?></td>
                            <td style="text-transform: capitalize;">
                            <a class="btn btn-danger" href="<?php echo base_url('dashboard/delete_users/' . $row->customer_id); ?>">
                                        <i class="halflings-icon white trash"></i> 
                                    </a>
                                    </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>            
            </div>
        </div><!--/span-->

    </div><!--/row-->



</div><!--/.fluid-container-->

<!-- end: Content -->