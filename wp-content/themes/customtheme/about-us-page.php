<?php
/*
    Template Name: About Us
*/
get_header();

custom_theme_assests();


if (have_posts()) :
    while (have_posts()) : the_post();
?>

        <article class="page-layout">
            <table style="width: 100%;">
                <tr>
                    <td class="tdcontent" width="30%">
                        <h2><?php the_title(); ?></h2>
                    </td>
                    <td class="tdcontent"><?php the_content(); ?></td>
                </tr>
            </table>
        </article>
<?php
    endwhile;

else :
    echo 'There is no pages!';

endif;
get_footer();
?>