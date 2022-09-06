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

			$this->start_controls_section(
				'animage',
				[
					'label' => esc_html__('Picture', 'elementor' ),
				]
			);
			$this->add_control(
				'andimage',
				[
					'type' => Controls_Manager::MEDIA,
					'default' => [
						'url' => Utils::get_placeholder_image_src(),
					],
				]
				);
			
		$this->add_responsive_control(
			'align',
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
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .header_image' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'image_a', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `image_size` and `image_custom_dimension`.
				'default' => 'Large',
				'separator' => 'none',
			]
		);




		$this->end_controls_section();

		$this->start_controls_section(
			'title_img',
			[
				'label' => esc_html__('Image Title', 'elementor')
			]
			
		);
		$this->add_control(
			'Title_im',
			[
				'label' => __('Heading Caption Text', 'elementor'),
				'type' => Controls_Manager::TEXT,
				'default' => 'Design',


			]
		);
		
		$this->add_responsive_control(
			'align_2',
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
					'{{WRAPPER}} .title' => 'text-align: {{VALUE}};',
				],
			]
		);



		
		$this->end_controls_section();

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
	

		$this->end_controls_section();


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

		$this->end_controls_section();
		$this->start_controls_section(
			'himage',
			[
				'label' => esc_html__('Avatar Picture', 'elementor' ),
			]
		);
		$this->add_control(
			'avatar1',
			[
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
			);
			$this->add_group_control(
				Group_Control_Image_Size::get_type(),
				[
					'name' => 'image_y', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `image_size` and `image_custom_dimension`.
					'default' => 'small',
					'separator' => 'none',
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'nametag',
			[
				'label' => esc_html__('Avatar Name', 'elementor')
			]
			
		);
		$this->add_control(
			'name_tag',
			[
				'label' => __('Name Text', 'elementor'),
				'type' => Controls_Manager::TEXT,
				'default' => 'name',


			]
		);
		$this->add_control(
			'date_time',
			[
				'label' => esc_html__('Time', 'elementor'),
				'type' => Controls_Manager::DATE_TIME,
				'dynamic' => [
					'active' => true,
				],
				'default' => '04/06/2022',


			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_name',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				],
				'selector' => '{{WRAPPER}} .nametag',
			]
		);
		


		
		$this->end_controls_section();

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 



		$this->start_controls_section(
			'section_style_image4',
			[
				'label' => esc_html__( 'Image', 'elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->end_controls_tab();

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'image_border34',
				'selector' => '{{WRAPPER}} .header_image',
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'image_border_radius23',
			[
				'label' => esc_html__( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .header_image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'image_box_shadow1',
				'exclude' => [
					'box_shadow_position',
				],
				'selector' => '{{WRAPPER}} .header_image',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'titleimg',
			[
				'label' => esc_html__( 'Title Color', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,

			]
		);
		$this->add_control(
			'color4',
			[
				'label' => esc_html__( 'Color', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#6121c9',
				'selectors' => [
					'{{WRAPPER}} h6' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_h6',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				],
				'selector' => '{{WRAPPER}} .title',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'content_shadow34',
				'selector' => '{{WRAPPER}} .title',
			]
		);

		$this->end_controls_section();



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
		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_testimonial_content',
			[
				'label' => esc_html__( 'Content', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
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
					'justify' => [
						'title' => esc_html__( 'Justified', 'elementor' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'selectors' => [
					'{{WRAPPER}}.pera_g' => 'text-align: {{VALUE}};',
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


		$this->start_controls_section(
			'avatar_image',
			[
				'label' => esc_html__( 'Avatar Image', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,

			]
		);

		$this->add_responsive_control(
			'align_1',
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
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .flex-container' => 'justify-content: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'image_size',
			[
				'label' => esc_html__( 'Image Size', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 20,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .for_avatar > img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'image_border',
				'selector' => '{{WRAPPER}} .for_avatar > img',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'image_radius',
			[
				'label' => esc_html__( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .for_avatar > img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_style_icon',
			[
				'label' => esc_html__( 'Icon', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'color6',
			[
				'label' => esc_html__( 'Color', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'rotate',
			[
				'label' => esc_html__( 'Rotate', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'deg' ],
				'default' => [
					'size' => 0,
					'unit' => 'deg',
				],
				'tablet_default' => [
					'unit' => 'deg',
				],
				'mobile_default' => [
					'unit' => 'deg',
				],
				'selectors' => [
					'{{WRAPPER}}  i, {{WRAPPER}} i' => 'transform: rotate({{SIZE}}{{UNIT}});',
				],
			]
		);


		$this->add_control(
			'border_width',
			[
				'label' => esc_html__( 'Border Width', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} i' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'view' => 'framed',
				],
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
					'{{WRAPPER}} i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'before',
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
					<?php if(!empty($settings['andimage']['url'])) {?>

						<div class="header_image">

							<?php Group_Control_Image_Size::print_attachment_image_html( $settings,'image_a','andimage'); ?>
						</div>
					
					<?php }?>
						
					<?php if(!empty($settings['Title_im'])) {?>
						
						<h6 class="title"><?php echo $settings['Title_im']; ?></h6>  <?php }?>


					
		            <div class="Parent">
					
						<div class="child1"> 
						
						<?php if(!empty($settings['heading'])) {?>	
								<h3 class="head1"><?php echo $settings['heading']; ?></h3>   <?php }?>
						</div>
						
						<?php if(!empty($settings['selected_icon']['value'])) {?>
							<div  class="child2">
								<?php Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true','class' =>'icon1' ]) ?>
							</div>

							<?php } ?>
							
						</div>
					<?php if(!empty($settings['peragraph'])) {?>
					
					<div class="paragraph">
					    <p class="pera_g"><?php echo $settings['peragraph']; ?></p>
		 			</div>

					 <?php }?>

					<div class="flex-container">

						<?php if(!empty($settings['avatar1']['url'])) {?>
							<div class="for_avatar">

								<?php Group_Control_Image_Size::print_attachment_image_html( $settings,'image_y','avatar1')?>
							</div>
							
						<?php }?>

							<div class="for_name">
							<?php if(!empty($settings['name_tag'])) {?>
						
								<h5 class="nametag"><?php echo $settings['name_tag']; ?></h5>   <?php }?>
							<?php if(!empty($settings['date_time'])) {?>
							
								<p class="data"><?php echo $settings['date_time']; ?></p> <?php }?>
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
