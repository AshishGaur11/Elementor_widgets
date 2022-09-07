<?php
namespace Elementor;

//ABSPATH can be used when pointing to Core files, but it will not function correctly if used to locate files/folders within wp-content

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Core\Admin\UI\Components\Button;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;//Elementor With a global color, you can apply a new color to multiple pages at once with a single click.

//In addition to streamlining your workflow, the Global Colors feature of Elementor also helps you to make sure that your website has a consistent color scheme on all parts. Here is to use this new feature.
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;
// Elementor global typography styles (Primary, Secondary, Text, and Accent)
/**
 * Elementor heading widget.
 *
 * Elementor widget that displays an eye-catching headlines.
 *
 * @since 1.0.0
 */
class Widget_Heading extends Widget_Base {
//wordpress Widget_Heading perameters (titles, instance, idbase)
	/**
	 * Get widget name.
	 *
	 * Retrieve heading widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'heading';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve heading widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Heading', 'elementor' );
		//If there is no translation, or the text domain isn’t loaded, the original text is escaped and returned (text,Uid)
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve heading widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-t-letter';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the heading widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * @since 2.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'basic' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @since 2.1.0
	 * @access public
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'heading', 'title', 'text' ];
	}

	/**
	 * Register heading widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 3.1.0
	 * @access protected
	 */
		protected function register_controls() {
		
		// icon
		$this->start_controls_section(
			'section_icon',
			[
				'label' => esc_html__( 'Icon', 'elementor' ),
			]
		);
		$this->add_control(
			'selected_icon',
			[
				'label' => esc_html__( 'Icon', 'elementor' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'fa-solid',
				],
			]
		);
		$this->add_control(
			'view',
			[
				'label' => esc_html__( 'View', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'default' => esc_html__( 'Default', 'elementor' ),
					'stacked' => esc_html__( 'Stacked', 'elementor' ),
					'framed' => esc_html__( 'Framed', 'elementor' ),
				],
				'default' => 'default',
				'prefix_class' => 'elementor-view-',
			]
		);
		$this->add_control(
			'shape',
			[
				'label' => esc_html__( 'Shape', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'circle' => esc_html__( 'Circle', 'elementor' ),
					'square' => esc_html__( 'Square', 'elementor' ),
				],
				'default' => 'circle',
				'condition' => [
					'view!' => 'default',
				],
				'prefix_class' => 'elementor-shape-',
			]
		);
		$this->add_responsive_control(
			'size',
			[
				'label' => esc_html__( 'Size', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 6,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->end_controls_section();
			
		
		// heading
		$this->start_controls_section(
			'title',
			[
				'label' => esc_html__('Header', 'elementor')
			]
			
		);
		$this->add_control(
			'heading',
			[
				'label' => __('Heading Text', 'elementor'),
				'type' => Controls_Manager::TEXT,
				'default' => 'text or heading',


			]
		);
		$this->add_responsive_control(
			'align_3',
			[
				'label' => esc_html__( 'Alignment', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'elementor' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'elementor' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'elementor' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} .head1' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();


		// paragraph
		$this->start_controls_section(
			'pera',
			[
				'label' => esc_html__( 'Paragraph', 'elementor' ),
			]
		);
		$this->add_control(
			'peragraph',
			[
				'label' => esc_html__( 'Paragraph', 'elementor' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus,luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor' ),
			]
		);
		$this->add_responsive_control(
			'align_33',
			[
				'label' => esc_html__( 'Alignment', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'elementor' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'elementor' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'elementor' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} .pera_g' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();


		//content arrangement
		$this->start_controls_section(
			'content_ar',
			[
				'label' => esc_html__( 'Content Arrangement', 'elementor' ),
			]
		);
		$this->add_control(
			'content_align',
			[
				'label' => esc_html__( 'Content Position', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'-1' => esc_html__( 'Row', 'elementor' ),
					'-2' => esc_html__( 'Column', 'elementor' ),
				],
				'default' => '-1',
				'prefix_class' => 'parent',
			]
		);
		$this->end_controls_section();


		//button arrangement
		$this->start_controls_section(
			'button_ar',
			[
				'label' => esc_html__( 'Button Arrangement', 'elementor' ),
			]
		

		);
		$this->add_control(
			'button_align',
			[
				'label' => esc_html__( 'Button Position', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'-1' => esc_html__( 'Row', 'elementor' ),
					'-2' => esc_html__( 'Column', 'elementor' ),
				],
				'default' => '-1',
				'prefix_class' => 'parent-button',
			]
		);
		$this->end_controls_section();


		// button 1
		$this->start_controls_section(
			'button1',
			[
				'label' => esc_html__( 'Button', 'elementor' ),
			]
		

		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography_1',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				],
				'selector' => '{{WRAPPER}} .button_1',
			]
		);
		$this->add_control(
			'Button_Text',
			[
				'label' => esc_html__( 'Button Text', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Click Here', 'elementor' ),
			]
		);
		$this->add_responsive_control(
			'align_6',
			[
				'label' => esc_html__( 'Alignment', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'elementor' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'elementor' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'elementor' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} .button_1' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'website_link_1',
			[
				'label' => esc_html__( 'Link', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'plugin-name' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',

				],
			]
		);
		$this->add_control(
			'selected_icon_a',
			[
				'label' => esc_html__( 'Icon', 'elementor' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'skin' => 'inline',
				'label_block' => false,

			]
		);
		$this->add_control(
			'icon_align',
			[
				'label' => esc_html__( 'Icon Position', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left' => esc_html__( 'Before', 'elementor' ),
					'right' => esc_html__( 'After', 'elementor' ),
				],
			]
		);
		$this->end_controls_section();


		// button 2
		$this->start_controls_section(
			'button2',
			[
				'label' => esc_html__( 'Button', 'elementor' ),
			]
		

		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography_2',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				],
				'selector' => '{{WRAPPER}} .button_1',
			]
		);
		$this->add_control(
			'Button_Text2',
			[
				'label' => esc_html__( 'Button Text', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Click Here', 'elementor' ),
			]
		);
		$this->add_responsive_control(
			'align_7',
			[
				'label' => esc_html__( 'Alignment', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'elementor' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'elementor' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'elementor' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} .button_2' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'website_link_2',
			[
				'label' => esc_html__( 'Link', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'plugin-name' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'selected_icon_b',
			[
				'label' => esc_html__( 'Icon', 'elementor' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'skin' => 'inline',
				'label_block' => false,

			]
		);
		$this->add_control(
			'icon_align_2',
			[
				'label' => esc_html__( 'Icon Position', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left' => esc_html__( 'Before', 'elementor' ),
					'right' => esc_html__( 'After', 'elementor' ),
				],
			]
		);
		$this->end_controls_section();


		// cross 
		$this->start_controls_section(
			'section_icon_an',
			[
				'label' => esc_html__( 'Icon', 'elementor' ),
			]
		);
		$this->add_control(
			'selected_icon_c',
			[
				'label' => esc_html__( 'Icon', 'elementor' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'fa-solid',
				],
			]
		);
		$this->end_controls_section();




		

	



		

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 


	
		// heading
		
		$this->start_controls_section(
			'Heading',
			[
				'label' => esc_html__( 'Heading', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,

			]
		);
		$this->add_control(
			'color3',
			[
				'label' => esc_html__( 'Color', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} h3' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'contenth3',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				],
				'selector' => '{{WRAPPER}} h3',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'content_shadow342',
				'selector' => '{{WRAPPER}} h3',
			]
		);
		$this->add_control(
			'head_margin_1',
			[
				'label' => esc_html__( 'Margin', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'head_padding_1',
			[
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'label' => esc_html__( 'Padding', 'plugin-name' ),
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				
			]
		);
		$this->end_controls_section();

		// paragraph

		$this->start_controls_section(
			'section_style_testimonial_content',
			[
				'label' => esc_html__( 'Content', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'para_margin_1',
			[
				'label' => esc_html__( 'Margin', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'para_padding_1',
			[
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'label' => esc_html__( 'Padding', 'plugin-name' ),
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				
			]
		);
		$this->add_control(
			'content_content_color',
			[
				'label' => esc_html__( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .pera_g' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				],
				'selector' => '{{WRAPPER}} .pera_g',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'content_shadow',
				'selector' => '{{WRAPPER}} .pera_g',
			]
		);
		$this->end_controls_section();

		//button1

		$this->start_controls_section(
			'button_style',
			[
				'label' => esc_html__( 'First Button', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'color1',
			[
				'label' => esc_html__( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				],
				'selectors' => [
					'{{WRAPPER}} .color1' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => esc_html__( 'Background', 'plugin-name' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .button_1',
			]
		);
		$this->add_responsive_control(
			'button_padding',
			[
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'label' => esc_html__( 'Padding', 'plugin-name' ),
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .button_1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => esc_html__( 'Border', 'plugin-name' ),
				'selector' => '{{WRAPPER}} .button_1',
			]
		);
		$this->add_responsive_control(
			'button_radius',
			[
				'label' => esc_html__( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .button_1' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'margin',
			[
				'label' => esc_html__( 'Margin', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .button_1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		//button2

		$this->start_controls_section(
			'button_style1',
			[
				'label' => esc_html__( 'Second Button', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'color2',
			[
				'label' => esc_html__( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				],
				'selectors' => [
					'{{WRAPPER}} .color2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background_1',
				'label' => esc_html__( 'Background', 'plugin-name' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .button_2',
			]
		);
		$this->add_responsive_control(
			'button_padding_1',
			[
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'label' => esc_html__( 'Padding', 'plugin-name' ),
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .button_2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border_1',
				'label' => esc_html__( 'Border', 'plugin-name' ),
				'selector' => '{{WRAPPER}} .button_2',
			]
		);
		$this->add_responsive_control(
			'button_radius_1',
			[
				'label' => esc_html__( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .button_2' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'margin_1',
			[
				'label' => esc_html__( 'Margin', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .button_2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		

		$this->start_controls_section(
			'cross-icon',
			[
				'label' => esc_html__( 'Remove icon', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'icon_indent_1',
			[
				'label' => esc_html__( 'Icon Spacing right', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .cross' => 'right: {{SIZE}}{{UNIT}};', 
					// '{{WRAPPER}} .cross' => 'margin-left: {{SIZE}}{{UNIT}};',

				],
			]
		);
		$this->add_control(
			'icon_indent_2',
			[
				'label' => esc_html__( 'Icon Spacing Top', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .cross' => 'top: {{SIZE}}{{UNIT}};',
					// '{{WRAPPER}} .cross' => 'margin-top: {{SIZE}}{{UNIT}};',

				],
			]
		);
		$this->end_controls_section();













}

	/**
	 * Render heading widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	public function render() {

		$settings = $this->get_settings_for_display();

	?>				

		<div class="parent">
			
			<div class="c1">
					<?php if(!empty($settings['selected_icon'])) {?>	

					<div class='icon elementor-icon'>
						<?php Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true','class' =>'icon1','view']);?>


					</div>
					<?php }?>

			</div>


			
					
			<div class="c2">		
					<?php if(!empty($settings['heading'])) {?>	
					<div class="child1"> 
							<h3 class="head1"><?php echo $settings['heading']; ?></h3>   
					</div>		
					<?php }?>
						
						

						
					<?php if(!empty($settings['peragraph'])) {?>

						<div class="paragraph">

								<p class="pera_g"><?php echo $settings['peragraph']; ?></p>
						</div>

					<?php }?>
	
						<div class="button-parent">
							<div class="button_1">
								<?php if($settings['icon_align']=='right'){?>
							
									<a class="color1" href="<?php echo 'https://'.$settings['website_link_1']['url'];?>">
										
										<?php echo $settings['Button_Text']; ?>
										<?php Icons_Manager::render_icon( $settings['selected_icon_a'], [ 'aria-hidden' => 'true','class' =>'icon1','view']);?>
									</a>
								<?php } ?>
								<?php if($settings['icon_align']=='left'){?>
									<a class="color1">
										<?php Icons_Manager::render_icon( $settings['selected_icon_a'], [ 'aria-hidden' => 'true','class' =>'icon1','view']);?>
										<?php echo $settings['Button_Text']; ?>

									</a>
								<?php } ?>


							

							</div>

							<div class="button_2">
								<?php if($settings['icon_align_2']=='right'){?>
							
									<a class="color1">
										<?php echo $settings['Button_Text2']; ?>
										<?php Icons_Manager::render_icon( $settings['selected_icon_b'], [ 'aria-hidden' => 'true','class' =>'icon1','view']);?>
									</a>
								<?php } ?>
								<?php if($settings['icon_align_2']=='left'){?>
									<a class="color1">
										<?php Icons_Manager::render_icon( $settings['selected_icon_b'], [ 'aria-hidden' => 'true','class' =>'icon1','view']);?>
										<?php echo $settings['Button_Text2']; ?>

									</a>
								<?php } ?>


							

							</div>

						</div>


					






			</div>


		</div>

		<div class="c3">

			<div class="cross">
				<?php Icons_Manager::render_icon( $settings['selected_icon_c'], [ 'aria-hidden' => 'true','class' =>'icon1','view']);?>
			</div>

			
		</div>
					 
					 
					 
					 




							

					
		








	
	
<?php
}
		
		
	


	
	/**
	 * Render heading widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 2.9.0
	 * @access protected
	 */

}

?>
