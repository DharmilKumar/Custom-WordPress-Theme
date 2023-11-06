<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>
    <?php
    get_header();
    customize_the_excerpt_length();
    if (have_posts()) :
        while (have_posts()) : the_post();
            echo '<article class="post text-center">';
    ?>
            <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
            <?php
            echo '</article>';
            ?>
            <div class="text-center">
                <?php
                echo the_time('F jS, Y') . ' | ' . '<a href="' . get_author_posts_url(get_the_author_meta('ID'), get_the_author_meta('user_nicename')) . '">' . the_author() . '</a> |';

                ?>
                <?php
                $cat = get_the_category();
                $ot = '';
                if ($cat) {

                    foreach ($cat as $cats) {
                        $ot .= '<a href="' . get_category_link($cats->term_id) . '">' . $cats->cat_name . '</a>' . ', ';
                    }
                    echo trim($ot, ', ');
                }
                ?>
                <!-- <div class='single-post-image'>
                    <a href='<?php the_permalink() ?>'>
                        <?php the_post_thumbnail('single-post-image') ?>
                        <a>
                </div> -->
            </div>
        <?php
            the_content();
        endwhile;
        ?>
        <div class="col-xs-6 text-left">
            <?php

            previous_post_link();
            ?>
        </div>
        <div class="col-xs-6 text-right">
            <?php
            next_post_link();
            ?>
        </div>

    <?php
    
        
    else :
        echo "No post found";
    endif;
    ?>
    <?php
    get_footer();  ?>
</body>

</html>