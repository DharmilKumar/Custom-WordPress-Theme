<?php 
/*
    Template Name: collywood
*/

get_header();
custom_theme_assests();
if(have_posts()):
    while(have_posts()): the_post();
?>
    <article class="bollywood">
    <h2><?php  the_title()?></h2>
    <p>Time is: "<?php the_time('F jS, Y') ?>"</p>
    <p>The Author is: "<?php the_author() ?>"</p>
    <p><?php the_content(); ?></p>
    </article>
<?php
    endwhile;
endif;
get_footer();
?>