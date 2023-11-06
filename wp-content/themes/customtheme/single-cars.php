<!DOCTYPE html>
<html>

<head>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->

</head>

<body>
    <?php
    get_header();
    customize_the_excerpt_length();
    car_title();
    echo '<div class="slideshow-container" style="margin:20px;">';
    if (have_posts()) :
        while (have_posts()) : the_post();
            echo '<article class="post single-post">';
            $w = new WP_Query(['post_type' => 'cars', 'posts_per_page' => 1]);
            $c = $w->found_posts;
            $i = 1;
            $a = 0;
            while ($i <= $c) {
                $exampleShowTitle = get_post_meta($post->ID, 'metabox_example_show_text' . $i, true);
                if (!empty($exampleShowTitle)) {
                    $a++;
                    $title = get_the_title($exampleShowTitle);
                    // echo get_the_title($exampleShowTitle) . '<br>';
                    $feat_image = wp_get_attachment_url(get_post_thumbnail_id($exampleShowTitle));
                    // echo '<img src="' . $feat_image . '" alt="" width=100>';
    ?>

                    <!-- Full-width images with number and caption text -->
                    <div class="mySlides fade">
                        <img src="<?php echo $feat_image ?>" width="700px" height="500px">
                        <div class="text"><?php echo $title  ?></div>
                    </div>



            <?php
                }
                $i++;
            }
            if ($a == 0) {
                echo " <h2> There is No Recommendation Post</h2>";
            }
            ?>
            <!-- Next and previous buttons -->
            <!-- <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a> -->
            <br>

            <!-- The dots/circles -->
            <!-- <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            -->

            </div>


            <script>
                // let slideIndex = 1;
                // showSlides(slideIndex);

                // // Next/previous controls
                // function plusSlides(n) {
                //     showSlides(slideIndex += n);
                // }

                // // Thumbnail image controls
                // function currentSlide(n) {
                //     showSlides(slideIndex = n);
                // }

                // function showSlides(n) {
                //     let i;
                //     let slides = document.getElementsByClassName("mySlides");
                //     let dots = document.getElementsByClassName("dot");
                //     if (n > slides.length) {
                //         slideIndex = 1
                //     }
                //     if (n < 1) {
                //         slideIndex = slides.length
                //     }
                //     for (i = 0; i < slides.length; i++) {
                //         slides[i].style.display = "none";
                //     }
                //     for (i = 0; i < dots.length; i++) {
                //         dots[i].className = dots[i].className.replace(" active", "");
                //     }
                //     slides[slideIndex - 1].style.display = "block";
                //     dots[slideIndex - 1].className += " active";
                // }



                //auto
                let slideIndex = 0;
                showSlides();

                function showSlides() {
                    let i;
                    let slides = document.getElementsByClassName("mySlides");
                    for (i = 0; i < slides.length; i++) {
                        slides[i].style.display = "none";
                    }
                    slideIndex++;
                    if (slideIndex > slides.length) {
                        slideIndex = 1
                    }
                    slides[slideIndex - 1].style.display = "block";
                    setTimeout(showSlides, 2000); // Change image every 2 seconds
                }
            </script>

            <?php  ?>
            <h2 style="text-align: center;"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
            <?php
            echo '</article>';
            ?>
            <div class="single-post">
                <?php
                echo the_time('F jS, Y') . ' | ' . '<a href="' . get_author_posts_url(get_the_author_meta('ID'), get_the_author_meta('user_nicename')) . '">' . the_author() . '</a> |';

                ?>
                <?php
                $cat = get_the_category();
                $categories = get_the_category();

                $ot = '';
                if ($cat) {

                    foreach ($cat as $cats) {
                        $ot .=  $cats->cat_name . ', ';
                    }
                    echo trim($ot, ', ');
                }
                ?>
                <div class='single-post-image'>
                    <!-- <a href='<?php the_permalink() ?>'>
                        <?php the_post_thumbnail('single-post-image') ?>
                        <a> -->
                </div>
            <?php

            $link = get_post_meta($post->ID, 'link', true);
            the_content();
            echo '<a href="' . $link . '"><p>click here to visit official site</p></a>';

        endwhile;

        // wp_pagenavi(array('query' => $w));

            ?>
            <!-- <tr>
                <div class="col-xs-6 text-left">
                    <?php

                    // previous_post_link();
                    ?>
                </div>
                <div class="col-xs-6 text-right">
                    <?php
                    // next_post_link();
                    ?>
                </div>
            </tr> -->



      <?php

    // echo previous_post_link();
    // echo next_post_link();
    // echo get_previous_post_link();
    // echo get_next_post_link();
    else :
        echo "No posts found";
    endif;

        ?>
            </div>
            <?php
            get_footer();  ?>
</body>

</html>