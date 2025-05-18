<?php
// include get_parent_theme_file_path('parts/header.php');
get_header();
?>

<div id="content">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <h2><?php the_title(); ?></h2>

            <?php

            if (has_post_thumbnail()) {
                the_post_thumbnail();
            }

            the_content();

            $terms = get_the_terms(get_the_ID(), 'tag');

            if ($terms && ! is_wp_error($terms)) :

                foreach ($terms as $term) : ?>
                    <p>
                        <?= $term->name; ?>
                    </p>
            <?php endforeach;

            endif;


            ?>

    <?php endwhile;
    endif; ?>
</div>

<?php
// include get_parent_theme_file_path('parts/footer.php');
get_footer();
