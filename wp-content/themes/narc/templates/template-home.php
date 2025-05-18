<?php /* Template Name: Home*/ ?>
<?php
get_header();
?>
<div class="banner" style="background-image:url('<?php echo get_field('banner_image')['url'] ?>'); ">
    <h1 class="title white">
        <?php echo get_field('banner_title'); ?>
    </h1>
    <h6 class="description white">
        <?php echo get_field('banner_description'); ?>
    </h6>
    <a href="#" class="button light-teal">
        <?php echo get_field('banner_button')['title']; ?>
    </a>
    <p class="white free-trial">
        <?php echo get_field('banner_free'); ?>
    </p>
    <img src="<?php echo get_field('banner_arrow')['url']; ?>" alt="arrow" class="arrow">
</div>

<section class="benefits">
    <h1 class="title dark-teal"><?php echo get_field('benefits_header'); ?></h1>
    <div class="card-wrap">
        <?php foreach (get_field('benefits_card') as $index => $card) : ?>
            <div class="narc-card">
                <figure class="img">
                    <img src="<?php echo $card['image']['url']; ?>" alt="img">
                </figure>
                <div class="content">
                    <h1 class="title inner <?php echo $index % 2 == 1 ? 'white' : 'dark-teal' ?>">
                        <?php echo $card['title']; ?>
                    </h1>
                    <p class="description <?php echo $index % 2 == 1 ? 'white' : '' ?>">
                        <?php echo $card['desc']; ?>
                    </p>
                    <a href="#" class="button <?php echo $index % 2 == 1 ? 'light-teal' : 'dark-teal' ?>">
                        <?php echo $card['link']['title']; ?>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="partners">
    <h4 class="title dark-teal">
        <?php
        echo get_field('partners_title');
        ?>
    </h4>
    <div class="partners-logo">
        <?php
        ?>
        <?php foreach (get_field('partners_images') as $image):
        ?>
            <figure class="image-container">
                <img src="<?php echo $image['url']; ?>" alt="partners-logo" class="partners_images">
            </figure>
        <?php endforeach ?>
    </div>
</section>
<section class="testimonials">
    <div class="block-quotes white">
        <?php foreach (get_field('testimonials') as $quote) : ?>
            <div class="quotes" style="">
                <p class="quotation-mark"><?php echo $quote['quotation_mark'] ?></p>
                <p class="description">
                    <?php echo $quote['quote_content']; ?>
                </p>
                <p class="author"><strong><?php echo $quote['author'] ?></strong></p>
            </div>
        <?php endforeach ?>
    </div>

</section>
<section class="plan">
    <h1 class="title dark-teal"><?php echo get_field('plan_title') ?></h1>
    <div class="all-plans">
        <?php foreach (get_field('detailed_plan') as $plan): ?>
            <div class="detailed-plan">
                <div class="mobile number">
                    <h2 class="number dark-teal"><?php echo $plan['num']; ?></h2>
                    <!-- <figure class="img">
                        <img src="<?php echo $plan['icon']['url']; ?>">
                    </figure> -->
                </div>

                <div class="content">
                    <figure class="img">
                        <img src="<?php echo $plan['icon']['url']; ?>">
                    </figure>
                    <p class="title dark-teal">
                        <?php echo $plan['subtitle']; ?>
                    </p>
                    <p class="description">
                        <?php echo $plan['description']; ?>
                    </p>
                </div>

            </div>
        <?php endforeach; ?>

    </div>

</section>
<section class="location">
    <figure class="img">
        <img src="<?php echo get_field('location_image')['url']; ?>" alt="outdoor">
    </figure>
    <div class="content">
        <div class="text">
            <h1 class="title dark-teal">
                <?php echo get_field('location_title'); ?>
            </h1>
            <p class="description dark-teal">
                <?php echo get_field('location_desc'); ?>

            </p>
            <p class="description dark-teal">
                <?php echo get_field('location_bold'); ?>
            </p>
        </div>

        <a href="#" class="button dark-teal">
            <?php echo get_field('location_button')['title']; ?>
        </a>
    </div>
</section>
<section class="video">
    <h1 class="title dark-teal">
        <?php echo get_field('video_title'); ?>
    </h1>
    <!-- <video width="" height="" controls>
            <source source="" type="mp4">
        </video> -->
    <figure class="img">
        <img src="<?php echo get_field('video_player')['url']; ?>">
    </figure>
</section>
<section class="section-subscription">
    <div class="subscription-wrap">
        <!-- <h3 class="title"><?php echo get_field('subscribe_label'); ?></h3> -->
        <?php echo do_shortcode(get_field('input')) ?>
    </div>
</section>

<section class="query">
    <?php
    // The Query.
    $args = array('post_type' => 'narc_portfolio');
    $the_query = new WP_Query($args);

    // The Loop.
    if ($the_query->have_posts()) {
        echo '<div>';
        while ($the_query->have_posts()) {
            $the_query->the_post();
            echo '<p>' . esc_html(get_the_title()) . '</p>';
            echo '<img src="' . esc_url(get_the_post_thumbnail_url()) . '" alt="img">';
        }
        echo '</div>';
    } else {
        esc_html_e('Sorry, no posts matched your criteria.');
    }
    // Restore original Post Data.
    wp_reset_postdata();
    ?>
</section>
<?php
get_footer();
