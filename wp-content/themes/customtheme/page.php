<?php
get_header();
custom_theme_assests();
if (have_posts()) {
    while (have_posts()) : the_post();
    
        echo '<article class="page-layout">';
        $args = ['child_of' => get_the_top_ancestor_id(), 'title_li' => '',];
        wp_list_pages($args);
        echo '<h2>' . the_title() . '</h2>';
        echo "<h2>Hey buddy! Don't be scared this is example page</h2>";
        echo "</article>";
    endwhile;
} else {
    echo 'There are no pages';
}
get_footer();
