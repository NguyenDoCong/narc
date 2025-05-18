<?php

//namespace Elementor;

class Elementor_Quotes extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'narc-quotes';
    }

    public function get_title()
    {
        return __(' Narc Quotes', 'narc');
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
                'label' => __('List Quotes', 'narc'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'mark',
            [
                'label' => esc_html__('Mark', 'narc'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('Enter quote mark here', 'narc'),
            ]
        );

        $repeater->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'narc'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'placeholder' => esc_html__('Enter description here', 'narc'),
            ]
        );

        $repeater->add_control(
            'author',
            [
                'label' => esc_html__('Author', 'narc'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('Enter author here', 'narc'),
            ]
        );

        $this->add_control(
            'list',
            [
                'label' => __('List', 'narc'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),

            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <section class="testimonials">

            <div class="block-quotes white">
                <?php foreach ($settings['list'] as $element): ?>
                    <div class="quotes">
                        <div class="quotation-mark">
                            <?= $element['mark']; ?>
                        </div>
                        <div class="description">
                            <?= $element['description']; ?>
                        </div>
                        <div class="author">
                            <?= $element['author']; ?>
                        </div>

                    </div>
                <?php endforeach ?>
            </div>
        </section>

<?php
    }
}
