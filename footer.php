<div class="footer">
<<<<<<< HEAD
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <?php 
                        
                        if(is_active_sidebar( "footer-1" )){
                            dynamic_sidebar( "footer-1" );
                        }
                    
                    ?>
                </div>
                <div class="col-md-6">
                    <?php 
                        
                        if(is_active_sidebar( "footer-2" )){
                            dynamic_sidebar( "footer-2" );
                        }


                        wp_nav_menu( 
                            array(
                                'menu'                 => '',
                                'container'            => 'div',
                                'container_class'      => '',
                                'container_id'         => '',
                                'container_aria_label' => '',
                                'menu_class'           => 'menu list-inline text-right',
                                'menu_id'              => 'footer_container',
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
                                'theme_location'       => 'footermenu',
                            )
                         
                        );
                    
                    ?> 
=======
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <?php if (is_active_sidebar("footer-1")) {
                    dynamic_sidebar("footer-1");
                }
                ?>
            </div>
            <div class="col-md-6">
                <?php if (is_active_sidebar("footer-2")) {
                    dynamic_sidebar("footer-2");
                }
                ?>

                <div class="footer_menu">
                    <?php wp_nav_menu(

                        array(
                            'menu_class'           => 'inline text-right',
                            'menu_id'              => 'footermenucontainer',
                            'theme_location'       => 'footermenu',
                        )

                    ); ?>
>>>>>>> cb63854d48816e5c5c90a1f486d0896b58c83c30
                </div>
            </div>
        </div>
    </div>
</div>

<?php wp_footer() ?>