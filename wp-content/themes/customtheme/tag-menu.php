<?php
/*
Template Name: Tag
*/

get_header();


// Display the list of tags for the 'cars' custom post type
$tags = get_terms('post_tag', array('hide_empty' => false)); // Retrieve all tags
    if (!empty($tags)) {
        echo '<div style="align-items: center;">';
        echo '<div class="navigation-menu2">';
        echo '<ul>';
        foreach ($tags as $tag) {
            echo '<li><a href="' . get_term_link($tag) . '">' . $tag->name . '</a></li>';
        }
        echo '</ul></div></div>';
    } else {
        echo 'No tags found.';
    }

get_footer();
?>