<div class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="tagline">
                        <?php bloginfo( "description" ) ?>
                    </h3>
                    <h1 class="align-self-center display-1 text-center heading">
                        <a href="<?php echo site_url(); ?>"><?php bloginfo( "name" ) ?></a>
                    </h1>
                </div>

                <div class="col-md-12">
                    <div class="navigation">
<<<<<<< HEAD
                        <?php

                            wp_nav_menu( 
                                array(
                                    'menu'                 => '',
                                    'container'            => 'div',
                                    'container_class'      => '',
                                    'container_id'         => '',
                                    'container_aria_label' => '',
                                    'menu_class'           => 'menu list-inline text-center',
                                    'menu_id'              => 'topmenu_container',
                                    'echo'                 => true,
                                    'fallback_cb'          => 'wp_page_menu',
                                    'before'               => '',
                                    'after'                => '',
                                    'link_before'          => '',
                                    'link_after'           => '',
                                    'items_wrap'           => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                    'item_spacing'         => 'preserve',
                                    'depth'                => 0,
                                    'walker'               => '',
                                    'theme_location'       => 'topmenu',
                                )
                             
                            );

                        ?>
=======
                        <?php wp_nav_menu(

                                array(
                                    'menu_class'           => 'inline text-center',
                                    'menu_id'              => 'topmenucontainer',
                                    'theme_location'       => 'topmenu',
                                )

                            ); ?>
>>>>>>> cb63854d48816e5c5c90a1f486d0896b58c83c30
                    </div>
                </div>
            </div>
        </div>
    </div>