<?php

//namespace Elementor;

class Elementor_Query extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'narc-query';
    }

    public function get_title()
    {
        return __(' Narc Query', 'narc');
    }

    public function get_icon()
    {
        return 'icon-quotes-carousel';
    }

    public function get_categories()
    {
        return ['basic'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'select',
            [
                'label' => __('Select Query', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'post',
                'options' => [
                    // 'default' => esc_html__('Default', 'textdomain'),
                    'post' => esc_html__('Post', 'textdomain'),
                    'narc_portfolio' => esc_html__('Portfolio', 'textdomain'),
                ],
            ]
        );

        $this->add_control(
            'order_by',
            [
                'label' => __('Order By', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'DESC',
                'options' => [
                    // 'default' => esc_html__('Default', 'textdomain'),
                    'DESC' => esc_html__('Newest First', 'textdomain'),
                    'ASC' => esc_html__('Oldest First', 'textdomain'),
                ],
            ]
        );

        $this->end_controls_section();
    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <section class="query">
            <?php
            // The Query.
            $args = array(
                'post_type' => $settings['select'],
                'order' => $settings['order_by'],
            );
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
    }
}
