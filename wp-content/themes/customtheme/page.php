<?php
get_header();
custom_theme_assests();
if (have_posts()) {
    while (have_posts()) : the_post();
    
        echo '<article class="page-layout">';
        $args = ['child_of' => get_the_top_ancestor_id(), 'title_li' => '',];
        wp_list_pages($args);
        ?>
        <h1><?php echo the_title() ?></h1>
        <?php
        // echo "<h2>Hey buddy! Don't be scared this is example page</h2>";
        // if(!empty(get_post_meta('sub_title'))){
            
        // }
        echo the_content();
        if (function_exists('the_field')) {
            if(get_field('sub_title')!=''){
                echo "<h2>".the_field('sub_title')."</h2>";
            }
            if(get_field('field_price')!=''){
                echo 'The Price is: <b>$';echo the_field('field_price').'</b>';echo '<br>';}
            if(get_field('field_eng')!=''){
                echo "Engine: <b>";echo the_field('field_eng');echo "</b><br>";}
            if(get_field('field_hp')!=''){
                echo "Power: <b>";echo the_field('field_hp');echo "</b><br>";}
        } 
        echo "</article>";
    endwhile;
} else {
    echo 'There are no pages';
}
get_footer();
