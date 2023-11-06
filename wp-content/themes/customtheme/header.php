<!DOCTYPE html>
<html <?php language_attributes() ?>>

<link rel="profile" href="https://gmpg.org/xfn/11">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <title>
        <?php bloginfo('name'); ?>?>
        <?php wp_head(); ?>
    </title>
    <?php custom_theme_assests(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="container">
        <header class="site-header">
            <div class="header-search">
                <?php get_search_form(); ?>
            </div>
            <h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name') ?></a></h1>
            <h1><?php bloginfo('description'); ?></h1>
            <nav class="navigation-menu">
                <?php
                $args = ['theme_location' => 'primary'];
                // $arr = ['post_type'=>'cars'];
                // $q = new WP_Query($arr);
                wp_nav_menu($args);
                // wp_nav_menu($q);



                ?>

            </nav>

        </header>
        <?php
        $w = new WP_Query(['post_type' => 'post']);
        $c = $w->found_posts;

        $i = 1;
        while ($i <= $c) {
            // $exampleShowTitle = get_post_meta($post->ID, 'metabox_example_show_title' . $i, true);
            // echo $exampleShowTitle;
            $i++;
        }


        if (is_page('example-page')) :
            echo "<h3>This is is_page() and we pass argument 'example-page' so this is display in only example page</h3>";
        // elseif(is_page('Hollywood')):
        //     the_content();
        // elseif(is_page('Bollywood')):
        //     the_content();
        // elseif(is_page('Cartoon')):
        //     the_content();
        // elseif(is_page('Tollywood')):
        //     the_content();
        endif
            ?>
            <!-- <h2><a href="#">PHP Tutorial Blog Post</a></h2>
        <p>PHP is the language that most of WordPress is built with. It is a scripting language that has humble roots, but has evolved to become a very powerful and modern language with full support for namespaces, object oriented programming, class reflection, closures, and much more. This in fact, is just an example post so we can test our custom wordpress theme. So glad you could read this example WordPress Post.</p>
        <h2><a href="#">WordPress Tutorial Blog Post</a></h2>
        <p>Hello World! We will write a short tutorial here about WordPress. Of course this is just dummy text for this post so that we can have something to read. Maybe you like swimming during the summer. Eating hamburgers at the cook out is fun for all. On Monday, you can go back to WordPress Website Development. There are many things to do.</p>
        <ul>
            <li>Commute to office</li>
            <li>Update WordPress Theme</li>
            <li>Finish Statistics Reports</li>
        </ul>
        <p>This is the end of this dummy post.</p> -->