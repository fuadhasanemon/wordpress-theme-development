<div class="footer">
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
                </div>
            </div>
        </div>
    </div>
</div>

<?php wp_footer() ?>