<?php
include get_parent_theme_file_path('parts/header.php');
// get_header(); 
?>

<div id="content">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <h2><?php the_title(); ?></h2>
            <?php the_content(); ?>
    <?php endwhile;
    endif; ?>
</div>

<?php
include get_parent_theme_file_path('parts/footer.php');
// get_footer(); 