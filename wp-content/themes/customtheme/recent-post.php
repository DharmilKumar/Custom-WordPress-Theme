<?php 
/*
    Template Name: recent-post
*/

get_header();
custom_theme_assests();
add_featured_image_support_to_your_wordpress_theme();
// $q = new WP_Query(['post_mime_type'=>'image']);
// var_dump($q);die;
if ( have_posts() ) :
	while ( have_posts() ) : the_post(); ?>

        <article class="page-layout">
            <nav class="child-navigation-menu children-links clearfix">
                <ul>
					<?php $args = [
						'child_of' => get_the_top_ancestor_id(),
						'title_li' => '',
					];
					wp_list_pages( $args ); ?>
                </ul>
            </nav>
			<?php the_content() ?>
        </article>
	
	<?php endwhile;

else :
	echo '<p>There are no pages!</p>';
endif; ?>
    <div class="home-columns clearfix">
        <div class="home-left">
            <h3>Recent Cat1 Post</h3>
			<?php 
            $javascriptPosts = new WP_Query( [ 'category_name' => 'cat1' ] );
			// var_dump($javascriptPosts);die;
			if ( $javascriptPosts->have_posts() ):
				
				while ( $javascriptPosts->have_posts() ): $javascriptPosts->the_post();
					get_template_part( 'thepost', get_post_format() );
				endwhile;
			
			else:
                echo 'No Post FOund';
            endif;
			wp_reset_postdata(); ?>
        </div>
        <div class="home-right">
            <h3>Recent Cat2 Post</h3>
			<?php 
            $phpPosts = new WP_Query( [ 'category_name' => 'cat2' ] );
			if ( $phpPosts->have_posts() ):
				
				while ( $phpPosts->have_posts() ): $phpPosts->the_post();
					get_template_part( 'thepost', get_post_format() );
				endwhile;
			
			else:
                echo 'No Post';
            endif;
			wp_reset_postdata();
			?>
        </div>
    </div>
<?php 
get_footer();
// pagination_nav();
	
?> 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 

get_footer();
?>