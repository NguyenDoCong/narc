<?php

//namespace Elementor;

class Elementor_Plan extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'narc-plan';
    }

    public function get_title()
    {
        return __(' Narc Plan', 'narc');
    }

    public function get_icon()
    {
        return 'icon-plan-carousel';
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
                'label' => __('List Plan', 'narc'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'number',
            [
                'label' => esc_html__('Number', 'narc'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('Enter number here', 'narc'),
            ]
        );

        $repeater->add_control(
            'image',
            [
                'label' => __('Image', 'narc'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'narc'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('Enter title here', 'narc'),
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
        <section class="plan">

            <div class="all-plans">
                <?php foreach ($settings['list'] as $element): ?>
                    <div class="detailed-plan">
                        <div class="mobile number">
                            <h2 class="number dark-teal">
                                <?= $element['number']; ?>
                            </h2>
                        </div>
                        <div class="content">
                            <figure class="img">
                                <img src="<?= $element['image']['url']; ?>" alt="img">
                            </figure>
                            <p class="title dark-teal">
                                <?= $element['title']; ?>
                            </p>
                            <div class="description">
                                <?= $element['description']; ?>
                            </div>
                        </div>


                    </div>
                <?php endforeach ?>
            </div>
        </section>

<?php
    }
}
