<?php 

get_header();

if(have_posts()){
    ?> <h2>Search result for query: "<?php the_search_query(); ?>"</h2>
    <?php
    while(have_posts()){
        the_post();
        get_template_part('thepost',get_post_format());
    }
}else{
    echo "no posts";
}
get_footer();

?>
