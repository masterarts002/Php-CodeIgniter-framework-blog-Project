<?php $this->db->select();
        $this->db->from('identity_table');
        $this->db->where('option_id', 1);
        $info = $this->db->get();
        $identity = $info->row();?>

<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- start: Meta -->
        <meta charset="utf-8">
        <title><?= $identity->site_title ?> Dashboard</title>
        <meta name="description" content="Develope by Master Arts">
        <meta name="author" content="Master Arts">
        <!-- end: Meta -->

        <!-- start: Mobile Specific -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- end: Mobile Specific -->
        
        <?php if($this->uri->segment(2)==="menu") : ?>
            <style>.navbar{display: none;}</style>
            <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
            <link id="bootstrap-style" href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
            <script> const _BASE_URL = '<?php echo base_url(); ?>'; let current_group_id = <?php if (!empty($group_id)) { echo $group_id; } ?>; </script>
            <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.3.custom.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/js/jquery.mjs.nestedSortable.js"></script>
            <script src="<?php echo base_url(); ?>assets/js/menu.js"></script>
            <script src="<?php echo base_url() ?>/assets/js/bootstrap.min.js"></script>
        <?php else: ?>
        <link id="bootstrap-style" href="<?php echo base_url()?>assets/admin/css/bootstrap.min.css" rel="stylesheet">
        <?php endif; ?> 
        <!-- start: CSS -->
        <link href="<?php echo base_url()?>assets/admin/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link id="base-style" href="<?php echo base_url()?>assets/admin/css/style.css" rel="stylesheet">
        <link id="base-style-responsive" href="<?php echo base_url()?>assets/admin/css/style-responsive.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
        <!-- end: CSS --> 
        <!-- start: Favicon -->
        <link rel="shortcut icon" href="<?php echo base_url('uploads/'.$identity->site_favicon)?>">
        <link rel="stylesheet"
      href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.7.2/styles/default.min.css">
     <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.7.2/highlight.min.js"></script>
        <!-- end: Favicon -->
        <script src="<?php echo base_url() ?>/assets/ckeditor/ckeditor.js"></script>




    </head>

    <body>
        <!-- start: Header -->
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="icon-list-alt" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
                    
                    </a>
                    <a class="brand" style="margin-left: -50px" href="<?php echo base_url('dashboard')?>">
                    <span><img width="30px" src="<?php echo base_url('uploads/'.$identity->site_favicon)?>"> <?= $identity->site_title ?> Dashboard</span></a>

                    <!-- start: Header Menu -->
                    <div class="nav-no-collapse header-nav">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="halflings-icon white user"></i> <?php echo $this->session->userdata('admin_name');?>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-menu-title">
                                        <span>Account Settings</span>
                                    </li>
                                    <li><a href="<?php echo base_url('dashboard-change-password')?>"><i class="halflings-icon key"></i> Change Password</a></li>
                                    <li><a href="<?php echo base_url('dashboard-logout')?>"><i class="halflings-icon off"></i> Logout</a></li>
                                </ul>
                            </li>
                            <!-- end: User Dropdown -->
                        </ul>
                    </div>
                    <!-- end: Header Menu -->

                </div>
            </div>
        </div>
        <!-- start: Header -->

        <div class="container-fluid-full">
            <div class="row-fluid">
                <!-- start: Main Menu -->
                <div id="sidebar-left" style="overflow-y: scroll;" class="span2">
                    <div class="nav-collapse sidebar-nav" >
                        <ul class="nav nav-tabs nav-stacked main-menu">	
                            <li><a href="<?php echo base_url('dashboard')?>"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>	
                            <li><a href="<?php echo base_url('add/category')?>"><i class="icon-list-alt"></i><span class="hidden-tablet"> Add Category</span></a></li>
                            <li><a href="<?php echo base_url('contact-mail')?>"><i class="icon-envelope"></i><span class="hidden-tablet"> Contact Mail
                            <span class="badge badge-info"><?php $q=$this->db->select()->from('contact_table')->where('read_unread', FALSE)->get();
                             $get_new_contact_rows = $q->num_rows(); If($get_new_contact_rows) { echo $get_new_contact_rows;} ?></span></span></a></li>
                            <li><a href="<?php echo base_url('manage/category')?>"><i class="icon-edit"></i><span class="hidden-tablet"> Manage Category</span></a></li>
                            <li><a href="<?php echo base_url('manage/menu')?>"><i class="icon-edit"></i><span class="hidden-tablet"> Manage Menu</span></a></li>
                            <li><a href="<?php echo base_url('add-footer-menu')?>"><i class="icon-list-alt"></i><span class="hidden-tablet"> Add Footer Link</span></a></li>
                            <li><a href="<?php echo base_url('manage-footer-menu')?>"><i class="icon-edit"></i><span class="hidden-tablet"> Manage Footer Link</span></a></li>
                            <li><a href="<?php echo base_url('add/post')?>"><i class="icon-list-alt"></i><span class="hidden-tablet"> Add Post</span></a></li>
                            <li><a href="<?php echo base_url('manage/post')?>"><i class="icon-edit"></i><span class="hidden-tablet"> Manage Post</span></a></li>
                            <li><a href="<?php echo base_url('site-identity')?>"><i class="icon-star"></i><span class="hidden-tablet"> Side Identity</span></a></li>
                            <li><a href="<?php echo base_url('add/slider')?>"><i class="icon-list-alt"></i><span class="hidden-tablet"> Add Slider</span></a></li>
                            <li><a href="<?php echo base_url('manage/slider')?>"><i class="icon-edit"></i><span class="hidden-tablet"> Manage Slider</span></a></li>
                            <li><a href="<?php echo base_url('client');?>"><i class="icon-list-alt"></i><span class="hidden-tablet"> Add Client</span></a></li>
                            <li><a href="<?php echo base_url('manage/client');?>"><i class="icon-edit"></i><span class="hidden-tablet"> Manage Client</span></a></li>
                            <li><a href="<?php echo base_url('manage-comments');?>"><i class="icon-comments"></i><span class="hidden-tablet"> Manage Comments 
                            <span class="badge badge-info"><?php $q=$this->db->select()->from('cmt_table')->where('read_unread', FALSE)->get();
                             $get_new_cmt_rows = $q->num_rows(); If($get_new_cmt_rows) { echo $get_new_cmt_rows;} ?></span></span></a></li>
                            <li><a href="<?php echo base_url('email-config')?>"><i class="icon-list-alt"></i><span class="hidden-tablet"> Email Config</span></a></li>
                        </ul>
                    </div>
                </div>
                <div  style="padding-top: 20px;"></div>
                <!-- end: Main Menu -->
                <noscript>
                <div class="alert alert-block span10">
                    <h4 class="alert-heading">Warning!</h4>
                    <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
                </div>
                </noscript>
                
                <?php echo $maincontent;?>
               
            </div><!--/#content.span10-->
        </div><!--/fluid-row-->

        <div class="modal hide fade" id="myModal">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Settings</h3>
            </div>
            <div class="modal-body">
                <p>Here settings can be configured...</p>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn" data-dismiss="modal">Close</a>
                <a href="#" class="btn btn-primary">Save changes</a>
            </div>
        </div>

        <div class="clearfix"></div>

        <footer style="background: #000 !important;">

            <p>
                <span style="text-align:left;float:left">&copy; 2021 <a style="color: #fff !important;" href="https://masterarts.net" alt="">Master Arts Dashboard</a></span>

            </p>

        </footer>

        <!-- start: JavaScript-->
        <?php if($this->uri->segment(2)==="menu") : ?>
        <?php else : ?>
         
        <script src="<?php echo base_url()?>assets/admin/js/jquery-1.9.1.min.js"></script>
        <script src="<?php echo base_url()?>assets/admin/js/jquery-migrate-1.0.0.min.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/jquery-ui-1.10.0.custom.min.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/jquery.ui.touch-punch.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/modernizr.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/bootstrap.min.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/jquery.cookie.js"></script>

        <script src='<?php echo base_url()?>assets/admin/js/fullcalendar.min.js'></script>

        <script src='<?php echo base_url()?>assets/admin/js/jquery.dataTables.min.js'></script>

        <script src="<?php echo base_url()?>assets/admin/js/excanvas.js"></script>
        <script src="<?php echo base_url()?>assets/admin/js/jquery.flot.js"></script>
        <script src="<?php echo base_url()?>assets/admin/js/jquery.flot.pie.js"></script>
        <script src="<?php echo base_url()?>assets/admin/js/jquery.flot.stack.js"></script>
        <script src="<?php echo base_url()?>assets/admin/js/jquery.flot.resize.min.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/jquery.chosen.min.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/jquery.uniform.min.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/jquery.cleditor.min.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/jquery.noty.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/jquery.elfinder.min.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/jquery.raty.min.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/jquery.iphone.toggle.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/jquery.uploadify-3.1.min.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/jquery.gritter.min.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/jquery.imagesloaded.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/jquery.masonry.min.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/jquery.knob.modified.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/jquery.sparkline.min.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/counter.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/retina.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/custom.js"></script>
        <!-- end: JavaScript-->
        <?php endif; ?>
    </body>
</html>
