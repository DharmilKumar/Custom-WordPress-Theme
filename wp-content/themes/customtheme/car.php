<!DOCTYPE html>
<html>

<head>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
</head>

<body>
    <?php
    /*
        Template Name: Customcar
    */
    get_header();
        $args = array(
            'post_type' => 'cars',
            'post_status' => 'publish',
        );

        echo '<br><br>';
    ?>
        <div class="">
            <!-- <h2 class="text-center">Car Company</h2> -->
        </div>
        <?php
        $loop = new WP_Query($args);
        echo '<div class="navigation-menu2">';
        echo '
    <ul class="mx-auto d-flex justify-content-around">';
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

    <?php
        wp_reset_postdata();

        get_footer();
    
    ?>
</body>

</html>