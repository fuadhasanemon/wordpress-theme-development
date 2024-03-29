<?php get_header(); ?>

<body <?php body_class(); ?>>

    <?php get_template_part("hero"); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="posts">

                    <?php

                    while (have_posts()) :
                        the_post();

                    ?>

                        <div class="post" <?php post_class(); ?>>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="post-title"> <?php the_title(); ?></h2>
                                    </div>

                                    <?php echo get_the_tag_list("<ul class=\"list-unstyled\"><li>", "</li><li>", "</li></ul>"); ?>
                                </div>

                                <div class="row">

                                    <div class="col-md-12">
                                        <p>
                                            <?php
                                            if (has_post_thumbnail()) {
                                                // the_post_thumbnail("large", array("class" => "img-fluid"));

                                                // for pop up image

                                                $thumbnail_url = get_the_post_thumbnail_url(null,"large" );
                                                echo '<a href="'.$thumbnail_url.'" data-featherlight="image">';
                                                the_post_thumbnail("large", array("class" => "img-fluid"));
                                                echo '</a>';
                                            }

                                            ?>
                                        </p>

                                        <p>
                                            <strong><?php the_author(); ?></strong><br />
                                            <?php echo get_the_date(); ?>
                                        </p>


                                        <?php

                                        the_content();

                                        next_post_link();

                                        echo "<br>";

                                        previous_post_link();

                                        ?>

                                    </div>

                                    <?php if (comments_open()) { ?>

                                        <div class="col-md-12">
                                            <?php comments_template(); ?>
                                        </div>

                                    <?php } ?>
                                </div>

                            </div>
                        </div>

                    <?php endwhile; ?>

                    <div class="container">
                        <div class="row">

                            <div class="col-md-12 pagination_post">
                                <?php the_posts_pagination(array(
                                    "screen_reader_text" => ' ',
                                    "prev_text" => "New Posts",
                                    "next_text" => "Old Posts"
                                )) ?>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="col-md-4">

                <?php if (is_active_sidebar("sidebar-1")) {
                    dynamic_sidebar("sidebar-1");
                }
                ?>

            </div>
        </div>
    </div>

    <?php get_footer(); ?>

</body>

</html>