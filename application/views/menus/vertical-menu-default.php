<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <?php $menu = get_main_menu($group_id); ?>
            <nav id="navbar_top" class="navbar navbar-expand-lg navbar-light bg-light pt-0 pb-0">
                   
                    <a class="navbar-brand" href="<?= base_url('/') ?>"><img class="img-fluid" src="<?= base_url('uploads/'.$get_identity->site_logo); ?>" alt=""></a>
                      <button class="navbar-toggler text-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                   <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav mr-auto">
                     <?php for ($i = 0; $i < count($menu->main_menu, true); $i++) { ?>
                            <?php if (count($menu->main_menu[$i]->parent_menu, true) == 0): ?>
                                <li class=""><a
                                            href="<?php echo base_url() . $menu->main_menu[$i]->url ?>">
                                        <?php echo
                                        $menu->main_menu[$i]->title ?></a></li>
                            <?php else: ?>
                                <li class="dropdown">
                                    <a href="<?php echo base_url() . $menu->main_menu[$i]->url ?>"
                                       class="dropdown-toggle"
                                       data-toggle="dropdown"><?php
                                        echo $menu->main_menu[$i]->title ?> <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <?php for ($b = 0; $b < count($menu->main_menu[$i]->parent_menu, true); $b++):
                                            if (!isset($menu->main_menu[$i]->parent_menu[$b]->parent_submenu)): ?>
                                                <li><a href="#"><?php echo
                                                        $menu->main_menu[$i]->parent_menu[$b]->title ?></a></li>
                                            <?php else: ?>
                                                <li class="dropdown dropdown-submenu"><a href="<?php echo base_url() .
                                                        $menu->main_menu[$i]->parent_menu[$b]->url ?>"
                                                                                         class="dropdown-toggle"
                                                                                         data-toggle="dropdown"><?php echo
                                                        $menu->main_menu[$i]->parent_menu[$b]->title ?></a>
                                                    <?php if (isset
                                                    ($menu->main_menu[$i]->parent_menu[$b]->parent_submenu)):
                                      ?>
                                                        <ul class="dropdown-menu">
                                                            <?php foreach
                                                            ($menu->main_menu[$i]->parent_menu[$b]->parent_submenu
                                                             as $par_sub) :

                                                              ?>
                                                                <li><a href="<?php echo
                                                                    $par_sub->url ?>"><?php echo
                                                                        $par_sub->title ?>
                                                                    </a></li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    <?php endif; ?>

                                                </li>
                                            <?php endif; ?>
                                        <?php endfor; ?>
                                    </ul>
                                </li>
                            <?php endif; ?>
                        <?php } ?>
                    </ul>
                    <form class="logo" action="<?php echo base_url('search');?>" method="post">
                      <div class="input-group mb-2 mt-2">
                        <input type="text" name="search" class="form-control" placeholder="Product Search">
                        <div class="input-group-append">
                          <button class="btn btn-outline-warning" type="submit">Search</button>
                        </div>
                      </div>
                    </form>
                </div>
            </nav>
        </div>




