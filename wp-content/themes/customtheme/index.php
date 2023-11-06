<?php
// get_header();
// customize_the_excerpt_length();
// if (have_posts()) :
//     while (have_posts()) : the_post();
//         echo '<article class="post">';
//         echo '<h2><a href="' . the_permalink() . '"></a></h2>';
//         echo '<h2>' . the_title() . '</h2>';
//         echo '</article>';
//         echo the_time('F jS, Y') . ' | ' . '<a href="' . get_author_posts_url(get_the_author_meta('ID'), get_the_author_meta('user_nicename')) . '">' . the_author() . '</a> |';
//         $cat = get_the_category();
//         $ot = '';
//         if ($cat) {

//             foreach ($cat as $cats) {
//                 $ot .= '<a href="' . get_category_link($cats->term_id) . '">' . $cats->name . '</a>' . ', ';
//             }
//             echo trim($ot, ', ');
//         }
?>
<!-- <div class="small-thumbnail">
            <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('small-thumbnail'); ?></a>
        </div>
        <p>
            <?php echo get_the_excerpt() ?>
            <a href="<?php the_permalink() ?>">Read more &raquo</a>
        </p> -->
<?php

//         the_content();

//     endwhile;
// else :
//     echo "No posts found";
// endif;
// get_footer();





?>




<?php
//new file
add_featured_image_support_to_your_wordpress_theme();
get_header();
initialize_widgets();
?>
<div class="main-content clearfix">
    <div class="main-column">
        <?php
        global $wp_query;
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                get_template_part('thepost', get_post_format());
            }
        } else {
            echo '<h2>No Posts Found</h2>';
        }
        ?>
        <?php
        $max_pages = $wp_query->max_num_pages;

        $current_page = max(1, get_query_var('paged'));

        echo '<div class="custom-pagination text-center">';

        if ($current_page > 1) {
            echo '<a href="' . get_pagenum_link($current_page - 1) . '"><i class="bi-arrow-left-square-fill prev-arr m-1"></i></a>';
        }

        for ($i = 1; $i <= $max_pages; $i++) {;
            if ($i === $current_page) {
                echo '<span class="current">' . $i . '</span>';
            } else {
                echo '<a class="page-item m-1" href="' . get_pagenum_link($i) . '">' . $i . '</a>';
            }
        }
        if ($current_page < $max_pages) {
            echo '<a href="' . get_pagenum_link($current_page + 1) . '"><i class="bi-arrow-right-square-fill next-arr m-1"></i></a>';
        }

        echo '</div>';
        ?>
    </div>
    <?php if (is_active_sidebar('rightsidebar')) { ?>
        <div class="sidebar-column">
            <?php dynamic_sidebar('rightsidebar') ?>
        </div>
    <?php }
    ?>
</div>

<?php
get_footer();


?>