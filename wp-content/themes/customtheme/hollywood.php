<?php 
/*
    Template Name: hollywood
*/

get_header();
custom_theme_assests();
if(have_posts()):
    while(have_posts()): the_post();
?>
    <article class="tollywood">
    <p><?php the_content(); ?></p>
    <p>The Author is: "<a href="<?php the_permalink()?>"><?php the_author() ?></a>"</p>
    <p>Time is: "<?php the_time('F jS, Y') ?>"</p>
    <h2><?php  the_title()?></h2>
    </article>
<?php
    endwhile;
endif;
get_footer();
?>