
<div id="content" class="span10">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div id="row">
                <div id="col-md-12">
                        <ul id="menu-group">
                            <?php foreach ($menu_groups as $menu) : ?>
                                <li id="group-<?php echo $menu->id; ?>">
                                    <a href="<?php echo site_url('menu/menu'); ?>/<?php echo $menu->id; ?>">
                                        <?php echo $menu->title; ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                            <!-- <li id="add-group">
                            <a href="<?php echo site_url('menugroup/add'); ?>"title="Add New Menu" class="btn  btn-default">+</a>
                            </li> -->
                            <li style="float: right;">
                            <a class="btn btn-primary" href="<?php echo base_url() ?>" target="_blank">PreviewMenu</a>
                            </li>
                        </ul>
                    <div class="row" style="margin-left:25px">    
                    <div id="main" class="span9">
                        
                        <div class="clear"></div>

                        <form method="post" id="form-menu" action="<?php echo site_url('menu/save_position'); ?>">
                            <div class="ns-row" id="ns-header">
                                <div class="actions">Actions</div>
                                <div class="ns-url">URL</div>
                                <div class="ns-title">Title</div>
                            </div>
                            <?php echo $menu_ul; ?>
                            <div id="ns-footer">
                                <button type="submit" class="btn btn-default btn-success" id="btn-save-menu">Save
                                    Menu
                                </button>
                            </div>
                            <br>
                        </form>
                    </div>
                    <aside class="span3 col-sm-12">
                        <section class="box">
                            <h2>Info</h2>
                            <div>
                                <p>Drag the menu list to re-order, </p>
                                <p>Click <b>Update Menu</b> to save the
                                    position.
                                </p>
                                <p>To add item on menu, use form below.</p>
                            </div>
                        </section>
                        <section class="box">
                            <h2>Current Menu</h2>
                            <div>
                                <span id="edit-group-input"><?php echo $group_title->title; ?></span>
                                (ID: <b><?php echo $group_id; ?></b>)
                                <div class="edit-group-buttons">
                                    <a id="edit-group" href="#" title="Edit Menu"><span class="btn btn-primary" style="color: #ffffff">Edit</span></a>
                                    <?php if ($group_id > 1) : ?>
                                        <a id="delete-group" href="#"><span class="btn btn-danger" style="color: #ffffff">Delete</span></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </section>
                        <section class="box">
                            <h2>Add To Menu</h2>
                            <div>
                                <form id="form-add-menu" method="post" action="<?php echo site_url('menu/add'); ?>">
                                    <div class="form-group">
                                        <label for="menu-title">Title</label>
                                        <input style="width: 100% !important;" type="text" name="title" required
                                               id="menu-title" class="form-control">
                                    </div>
                                    <div id="CsLink" class="form-group hidden">
                                        <label for="menu-url">Custom Link</label>
                                        <input type="text" name="url" id="menu-url" class="form-control"
                                               style="width: 100% !important;">
                                    </div>
                                    <div id="selectLink" class="form-group">
                                        <label for="menu-url">Select Link</label>
                                        <select type="text" style="width: 100% !important;" id="menu-url" name="url">
                                          <option value="" disabled selected>Select URL</option>
                                          <option value="<?php echo base_url('blog/');?>">Blog</option>
                                          <option value="<?php echo base_url('contact-us/');?>">Contact us</option>
                                          <?php foreach($all_pages as $page){?>
                                          <option value="<?php echo base_url('page/'.$page->page_slug);?>"><?php echo $page->page_title;?></option>
                                          <?php }?>
                                          
                                          <?php foreach($all_published_category as $single_category){?>
                                          <option value="<?php echo base_url('category/'.$single_category->category_slug);?>"><?php echo $single_category->category_name;?></option>
                                          <?php }?>
                                          
                                          <?php foreach($all_post as $row){?>
                                          <option value="<?php echo base_url('post/'.$row->post_slug);?>"><?php echo $row->post_title;?></option>
                                          <?php }?>
                                        </select>
                                    </div>
                                    <p class="buttons">
                                        <input type="hidden" name="group_id" value="<?php echo $group_id; ?>">
                                        <button id="add-menu" type="submit" class="btn btn-success ">Add Menu Item
                                        </button>
                                    </p>
                                </form>
                                <button id="cLink" class="btn btn-danger" onclick="myFunction()">Add custom link?</button>
                                <button id="sLink" class="btn btn-danger hidden" onclick="myFunction2()">Select link?</button>
                            </div>
                        </section>
                    </aside>
                    </div>
                    <div class="clear"></div>


                </div>
            </div>
            <div id="loading">
                <img src="<?php echo base_url(); ?>assets/images/ajax-loader.gif" alt="Loading">
                Processing...
            </div>
        </div>
    </div>
</div>
</div>

<script>
function myFunction() {
    $('#selectLink').addClass("hidden");
	$('#CsLink').removeClass("hidden");
    $('#cLink').addClass("hidden");
	$('#sLink').removeClass("hidden");
}

function myFunction2() {
    $('#selectLink').removeClass("hidden");
	$('#CsLink').addClass("hidden");
    $('#sLink').addClass("hidden");
	$('#cLink').removeClass("hidden");
}
</script>
