    <?php
    function custom_theme_assests()
    {
        wp_enqueue_style('style', get_stylesheet_uri());
    }
    // add_action('wp_enqueue_scripts', 'custom_theme_assets');
    // add_action('wp_enqueue_scripts','custom_theme_assests');
    register_nav_menus(['primary' => __('Primary Menus')]);

    function get_the_top_ancestor_id()
    {
        global $post;
        if ($post->post_parent) {
            $ancestors = array_reverse(get_post_ancestors($post->ID));
            return $ancestors[0];
        } else {
            return $post->ID;
        }
    }

    function customize_the_excerpt_length()
    {
        return 10;
    }
    add_filter('excerpt_length', 'customize_the_excerpt_length');



    function add_featured_image_support_to_your_wordpress_theme()
    {
        add_theme_support('post-thumbnails');
        add_image_size('small-thumbnail', 100, 100, true);
        add_image_size('single-post-image', 250, 250, true);
        add_theme_support('post-formats', [
            'aside',
            'gallery',
            'link',
            'image',
            'quote',
            'status',
            'video',
            'audio',
            'chat',
            'standards'
        ]);
    }

    add_action('after_setup_theme', 'add_featured_image_support_to_your_wordpress_theme');

    function initialize_widgets()
    {
        register_sidebar([
            'name' => 'Right Sidebar',
            'id'  => 'rightsidebar',
            'before_widget' => '<div class="widget-item"',
            'after_widget' => '</div>'
        ]);
        register_sidebar([
            'name' => 'Footer',
            'id'   => 'footer',
            'before_widget' => '<div class="widget-item"',
            'after_widget' => '</div>'
        ]);
    }
    add_action('widgets_init', 'initialize_widgets');



    //for custom post



    function create_posttype()
    {
        register_post_type(
            'cars',
            array(
                'labels' => array(
                    'name' => __('cars'),
                    'singular_name' => __('cars')
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => ['slug' => 'cars'],
            )
        );
    }
    add_action('init', 'create_posttype');


    function cw_post_type_cars()
    {

        $supports = array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'author',
            'revisions',
            'custom-fields',
            'post-formats'
        );

        $labels = array(
            'name' => _x('Cars', 'plural'),
            'singular_name' => _x('Car', 'car'),
            'menu_name' => _x('cars', 'admin menu'),
            'all_items' => __('All Cars'),
            'view_item' => __('View Car'),
            'add_new_item' => __('Add New Car'),
            'edit_item' => __('Edit Car'),
            'new_item' => __('New Car'),
            'search_items' => __('Search Cars'),
            'not_found' =>  __('No cars found'),
            'not_found_in_trash' => __('No cars found in Trash'),
            'parent_item_colon' => '',
        );

        $args = array(
            'description' => __('Description of the Cars.'),
            'labels' => $labels,
            'hierarchical' => false,
            'public' => true,
            'taxonomies' => array('category', 'post_tag'),
            'supports' => $supports,
            'rewrite' => array('slug' => 'cars'),
            'query_var' => true

        );

        register_post_type('cars', $args);

        // register_taxonomy( 'categories', array('cars'), array(
        //     'hierarchical' => true, 
        //     'label' => 'Categories', 
        //     'show_admin_column'=>true,
        //     'singular_label' => 'Category', 
        //     'rewrite' => array( 'slug' => 'categories', 'with_front'=> false )
        //     )
        // );
        // register_taxonomy('categories', array('cars'), array(
        //     'hierarchical' => true,
        //     'label' => 'Categories',
        //     'show_admin_column' => true,
        //     'singular_label' => 'Category',      
        //     'rewrite' => array('slug' => 'categories', 'with_front' => false),
        // ));


        // register_taxonomy('category', 'cars', array(
        //     'hierarchical' => true,
        //     'label' => 'Categories',
        //     'show_admin_column' => true,
        //     'rewrite' => array('slug' => 'cars/category'),
        // ));
        // register_taxonomy('post_tag', 'cars', array(
        //     'hierarchical' => false,
        //     'label' => 'Tags',
        //     'show_admin_column' => true,
        //     'rewrite' => array('slug' => 'cars/tag'),
        // ));
    }
    add_action('init', 'cw_post_type_cars');

    //for permalink of custom post tags and post-
    function modify_tag_query($query)
    {
        if ($query->is_tag() && $query->is_main_query()) {
            $query->set('post_type', array('cars', 'post'));
        }
    }
    add_action('pre_get_posts', 'modify_tag_query');


    //for feature image
    // add_filter( 'manage_edit-cars_columns', 'my_edit_page_columns' ) ;
    // function my_edit_page_columns( $columns ) {
    //     $new_columns = array(
    //        'featured_image' => __('featured Image', 'customtheme'),
    //    );
    // return array_merge($columns, $new_columns);
    // } 
    // add_action('manage_cars_columns' , 'custom_page_column', 1);
    // function custom_page_column($column, $post_id ){
    //     if ($column == 'featured_image'){
    //         if (has_post_thumbnail( $post_id ) ){
    //             $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'thumbnail' );
    //             echo '<img src="'.$image[0].'" />';
    //         }
    //     }       
    // }
    add_filter('manage_cars_posts_columns', 'add_img_column');
    add_filter('manage_cars_posts_custom_column', 'manage_img_column', 10, 2);

    function add_img_column($columns)
    {
        // $columns = array_slice($columns, 0, 1, true) + array("img" => "Featured Image") + array_slice($columns, 1, count($columns) - 1, true);
        // return $columns;
        $author_column = 'author';
        $position = array_search($author_column, array_keys($columns));

        // Insert the 'img' column after the 'author' column
        $columns = array_slice($columns, 0, $position + 1, true) +
            array("img" => "Featured Image") +
            array_slice($columns, $position + 1, count($columns) - 1, true);

        return $columns;
    }

    function manage_img_column($column_name, $post_id)
    {
        if ($column_name == 'img') {
            echo get_the_post_thumbnail($post_id, 'image_size');
        }
        return $column_name;
    }
    function image_size()
    {
        add_image_size('image_size', '100px', '70px', true);
    }
    add_action('after_setup_theme', 'image_size');



    //for default thumbnail
    function default_thumb_html($html)
    {
        if ('' == $html) {
            return '<img src="' . get_template_directory_uri() . '\CFM_2458v1.jpg" width="100px" height="70px" class="image-size-name" />';
        }
        // Else, return the post thumbnail
        return $html;
    }
    add_filter('post_thumbnail_html', 'default_thumb_html');



    //For recommendation posts in admin pannel
    add_filter('manage_cars_posts_columns', 'add_recommendation_column');
    add_filter('manage_cars_posts_custom_column', 'manage_recommendation_column', 10, 2);

    function add_recommendation_column($columns)
    {
        // $columns = array_slice($columns, 0, 1, true) + array("img" => "Featured Image") + array_slice($columns, 1, count($columns) - 1, true);
        // return $columns;
        
        $author_column = 'tags';
        $position = array_search($author_column, array_keys($columns));

        // Insert the 'img' column after the 'author' column
        $columns = array_slice($columns, 0, $position + 1, true) +
            array("recom" => "Recommendation") +
            array_slice($columns, $position + 1, count($columns) - 1, true);

        return $columns;
    }

    function manage_recommendation_column($column_name, $post_id)
    {
        
        if ($column_name == 'recom') {

            $w = new WP_Query(['post_type' => 'cars']);
            $c = $w->found_posts;
            $i = 1;
            $a = 0;
            while ($i <= $c) {
                $exampleShowTitle = get_post_meta($post_id, 'metabox_example_show_text' . $i, true);
                if (!empty($exampleShowTitle)) {
                    $a++;
                    $title = get_the_title($exampleShowTitle);
                    echo $title . '<br>';
                }
                $i++;
            }
        }
        return $column_name;
    }






    //meta box
    function car_title()
    {
        $args = array(
            'post_type' => 'cars',
            'post_status' => 'publish',
        );
        echo '<br><br>';
    ?>
        <div style="align-items: center;">
            <!-- <h2 class="text-center">Car Company</h2> -->

            <?php
            $loop = new WP_Query($args);
            echo '<div class="navigation-menu2">';
            echo '
        <ul class="">';
            while ($loop->have_posts()) : $loop->the_post(); ?>

                <li>
                    <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                    <!-- <button type="button" class="btn btn-light"> <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                    </button> -->
                </li>


            <?php
            endwhile;

            ?>
            </ul>
        </div>
        </div>
        <?php
        wp_reset_postdata();
    }

    //function for tag-list
    function tags()
    {
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
    }



    function metabox_example()
    {
        add_meta_box(
            'metabox_example_id',
            __('Add to Recommendation', 'example'),
            'metabox_example_html',
            ['cars'],
            'side'
        );
    }

    function metabox_example_html(\WP_Post $post)
    {

        // global $post;
        // $data = get_post_custom($post->ID);
        // $val = isset($data['text']) ? esc_attr($data['text'][0]) : 'No value';
        // echo '<input type="text" name="text" value="'.$val.'">';



        $que = new WP_Query(['post_type' => 'cars']);
        if ($que->have_posts()) :
            $i = 1;
            while ($que->have_posts()) : $que->the_post();



                $exampleShowTitle = get_post_meta($post->ID, 'metabox_example_show_title' . $i, true);
                $exampleShowText = get_post_meta($post->ID, 'metabox_example_show_text' . $i, true);

                // echo $exampleShowText . '<br>';
                $isChecked = $exampleShowTitle === 'on'; // Check if the value is 'on'
        ?>
                <label for="metabox_example_show_title<?php echo $i; ?>">
                    <input type="hidden" value="<?php echo get_the_ID(); ?> " name="metabox_example_show_text<?php echo $i; ?>">
                    <input type="checkbox" id="metabox_example_show_title<?php echo $i; ?>" value="<?php echo the_title(); ?>" name="metabox_example_show_title<?php echo $i; ?>" <?php checked($isChecked) ?> />
                    <?php the_title() ?><br>
                </label>
                <?php $i++;
                ?>
        <?php
            endwhile;
        endif
        ?>

    <?php


    }

    function save_metabox_example(int $post_id)
    {
        $que = new WP_Query(['post_type' => 'cars']);
        if ($que->have_posts()) :
            $i = 1;
            while ($que->have_posts()) : $que->the_post();

                $checkbox_name = 'metabox_example_show_title' . $i;

                if (isset($_POST[$checkbox_name])) {
                    update_post_meta($post_id, $checkbox_name, 'on');
                    update_post_meta($post_id, 'metabox_example_show_text' . $i, $_POST['metabox_example_show_text' . $i]);
                } else {
                    delete_post_meta($post_id, $checkbox_name);
                    delete_post_meta($post_id, 'metabox_example_show_text' . $i);
                }



                // if (array_key_exists('metabox_example_show_title'.$i, $_POST)) {
                //     update_post_meta(
                //         $post_id,
                //         'metabox_example_show_title'.$i,
                //         true
                //     );
                // } else {
                //     delete_post_meta(
                //         $post_id,
                //         'metabox_example_show_title'.$i
                //     );
                // }




                // global $post;
                // if(define('DOING_AUTOSAVE') && DOING_AUTOSAVE){
                //     return $post->ID;
                // }
                // update_post_meta($post->ID,$_POST['text'],true);
                $i++;

            endwhile;
        endif;
    }



    add_action('add_meta_boxes', 'metabox_example');
    add_action('save_post', 'save_metabox_example');


    function link_metabox()
    {
        add_meta_box(
            'Link-meta-id',
            'Link',
            'render_link_metabox',
            'cars',
            'side'
        );
    }
    function render_link_metabox(\WP_Post $post)
    {
        
        $link = get_post_meta($post->ID, 'link', true);
        
    ?>
        <label for="link">Enter Company Site</label>
        <input type="link" name="link" value="<?php echo $link ?>">
        <?php
    }
    function save_link_metabox(int $post_id)
    {
        if (isset($_POST['link'])) {
            update_post_meta($post_id, 'link', $_POST['link']);
        } else {
            delete_post_meta($post_id, 'link');
        }
    }
    add_action('add_meta_boxes', 'link_metabox');
    add_action('save_post', 'save_link_metabox');




    // Ensure Elementor is active before adding the custom widget
    add_action('elementor/widgets/widgets_registered', 'register_custom_elementor_widget');
    function register_custom_elementor_widget()
    {
        if (did_action('elementor/loaded')) {
            class Custom_Elementor_Widget extends \Elementor\Widget_Base
            {
                public function get_name()
                {
                    return 'custom-elementor-widget';
                }

                public function get_title()
                {
                    return __('Custom Elementor Widget', 'text-domain');
                }

                public function get_icon()
                {
                    return 'eicon-posts-grid';
                }

                public function get_categories()
                {
                    return ['basic'];
                }

                protected function _register_controls()
                {
                    $this->start_controls_section(
                        'section_content',
                        [
                            'label' => __('Content', 'text-domain'),
                        ]
                    );
                    $this->add_control(
                        'title',
                        [
                            'label' => __('Title', 'text-domain'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => __('Title', 'text-domain'),
                        ]
                    );
                    $this->end_controls_section();
                }

                protected function render()
                {
                    $args = array(
                        'post_type' => 'cars', // Change to your custom post type
                        'posts_per_page' => -1, // Retrieve all cars
                    );

                    $cars_query = new \WP_Query($args);

                    if ($cars_query->have_posts()) {
                        echo '<ul>';
                        while ($cars_query->have_posts()) {
                            $cars_query->the_post();
                            echo '<li>' . get_the_title() . '</li>';
                        }
                        echo '</ul>';

                        wp_reset_postdata(); // Reset post data query
                        
                    } else {
                        echo 'No cars found';
                    }
                }
            }

            // Register the widget
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Custom_Elementor_Widget());
        }
    }




    //pagination
    function ca_pagination()
    {

        if (is_singular())
            return;

        global $wp_query;

        $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
        $max   = intval($wp_query->max_num_pages);

        /** Add current page to the array */
        if ($paged >= 1)
            $links[] = $paged;

        /** Add the pages around the current page to the array */
        if ($paged >= 5) {
            $links[] = $paged - 1;
            $links[] = $paged - 2;
        }

        echo '<div class="navigation3"><ul>' . "\n";

        /** Previous Post Link */
        if (get_previous_posts_link())
            printf('<li>%s</li>' . "\n", get_previous_posts_link());
        /** Link to first page */
        if (!in_array(1, $links)) {
            $class = 1 == $paged ? ' class="active"' : '';

            printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');
        }

        /** Link to current page*/
        sort($links);
        foreach ((array) $links as $link) {
            $class = $paged == $link ? ' class="active"' : '';
        }
        /** Link to last page,*/
        if (!in_array($max, $links)) {
            if (!in_array($max - 1, $links))
                echo '<li>…</li>' . "\n";

            $class = $paged == $max ? ' class="active"' : '';
        }

        /** Next Post Link */
        if (get_next_posts_link())
            printf('<li>%s</li>' . "\n", get_next_posts_link());

        echo '</ul></div>' . "\n";
    }




//custom page example 1
add_action('admin_menu', 'form_data_menu1');

function form_data_menu1()
{
    add_menu_page('Custom Page', 'Custom Page', 1, __FILE__, 'form_data_list1');
}
function form_data_list1()
{
    include 'form1.php';
}


function my_acf_add_local_field_groups() {
    acf_add_local_field_group(array(
        'key' => 'group_cars_fields',
        'title' => 'Cars Fields',
        'fields' => array (
            array (
                'key' => 'field_sub_title',
                'label' => 'Sub Title',
                'name' => 'sub_title',
                'type' => 'text',
            ),array (
                'key' => 'field_car_price',
                'label' => 'Price',
                'name' => 'field_price',
                'type' => 'number',
            ),array (
                'key' => 'field_car_eng',
                'label' => 'Engine Type',
                'name' => 'field_eng',
                'type' => 'text',
            ),array (
                'key' => 'field_car_hp',
                'label' => 'Engine Power',
                'name' => 'field_hp',
                'type' => 'number',
            )
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ),
            ),
        ),
    ));
}

add_action('acf/init', 'my_acf_add_local_field_groups');

// Display the custom column data