<footer>
    <div class="top">
        <div class="logo">
            <!-- <?php if (is_active_sidebar('footer-sidebar-1')) { ?>
                <?php dynamic_sidebar('footer-sidebar-1'); ?>
            <?php } ?> -->
            <img src="<?php echo esc_url(get_parent_theme_file_uri('./assets/images/company-logo.png')); ?>" alt="" />
            <p>Proudly managed by Clublinks</p>
        </div>
        <div class="info">
            <div class="first-row">
                <div class="opening-hours">
                    <?php if (is_active_sidebar('footer-sidebar-2')) { ?>
                        <?php dynamic_sidebar('footer-sidebar-2'); ?>
                    <?php } ?>
                </div>
                <div class="quick-links">
                    <?php if (is_active_sidebar('footer-sidebar-3')) { ?>
                        <?php dynamic_sidebar('footer-sidebar-3'); ?>
                    <?php } ?>
                </div>
                <div class="welcome">
                    <?php if (is_active_sidebar('footer-sidebar-4')) { ?>
                        <?php dynamic_sidebar('footer-sidebar-4'); ?>
                    <?php } ?>
                </div>

            </div>
            <div class="second-row">
                <div>
                    <?php if (is_active_sidebar('footer-sidebar-5')) { ?>
                        <?php dynamic_sidebar('footer-sidebar-5'); ?>
                    <?php } ?>
                </div>
            </div>
        </div>

    </div>

    <div class="bottom">
        <p>© 2023 Northcote Aquatic &amp; Recreation Centre</p>
    </div>

    <a class="back-to-top" href="#">
        <span class="back-to-top-arrow">
            <img src="<?php echo get_theme_file_uri("/assets/images/Arrow-back-to-top.png"); ?>" alt="arrow">
        </span>
        <span class="text">Back to top</span>
    </a>

</footer>
<?php wp_footer(); ?>
</body>

</html>