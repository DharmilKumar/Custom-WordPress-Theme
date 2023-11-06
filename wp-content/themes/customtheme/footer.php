<?php custom_theme_assests(); ?>
<footer class="site-footer">
    <?php if (is_active_sidebar('footer')) { ?>
        <div>
            <?php dynamic_sidebar('footer') ?>
        </div>
    <?php } ?>
    <p><?php bloginfo('name'); ?></p>
</footer>
</div>
<?php 
wp_footer(); ?>
</body>

</html>