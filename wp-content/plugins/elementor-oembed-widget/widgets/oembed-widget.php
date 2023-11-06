<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_oEmbed_Widget extends \Elementor\Widget_Base
{
	public function get_name()
	{
		return 'Page per Posts';
	}

	public function get_title()
	{
		return esc_html__('Page per Posts', 'page-post-widgets');
	}
	public function get_icon()
	{
		return 'eicon-code';
	}

	public function get_custom_help_url()
	{
		return 'https://developers.elementor.com/docs/widgets/';
	}

	public function get_categories()
	{
		return ['basic'];
	}
	public function get_keywords()
	{
		return ['page', 'per', 'post'];
	}
	protected function register_controls()
	{

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__('Content', 'page-post-widgets'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'num',
			[
				'label' => esc_html__('Page Per Post', 'page-post-widgets'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'input_type' => 'NUMBER',
				'placeholder' => esc_html__('0', 'page-post-widgets'),
			]
		);

		$this->end_controls_section();
	}

	protected function render()
	{

		// $settings = $this->get_settings_for_display();
		// $html = wp_oembed_get($settings['url']);

		// echo '<div class="oembed-elementor-widget">';
		// echo ($html) ? $html : $settings['url'];
		// echo '</div>';

?>
		<!-- <form action="" method="post">
			<label for="a">Enter Post Counts</label>
			<input type="number" id="a" name="a" value="a">
			<input type="submit" name="submit" value="submit">
		</form> -->
		<?php
		$settings = $this->get_settings_for_display();
		$html = wp_oembed_get($settings['num']);
		echo '<div class="oembed-elementor-widget">';
		// echo ($html) ? $html : $settings['num'];
		$a = ($html) ? $html : $settings['num'];
		$paged = get_query_var('paged') ? get_query_var('paged') : 1;
		echo '</div>';
		$args = array(
			'post_type' => 'cars', // Change to your custom post type
			'posts_per_page' => $a,
			'paged' => $paged,

		);
		$cars_query = new \WP_Query($args);
		global $POST;
		if ($cars_query->have_posts()) {
			echo '<ul style="list-style-type:none;">';
			echo '<div  class="single-post">';
			while ($cars_query->have_posts()) {
				$cars_query->the_post();
				echo '<li><p2>' . get_the_title() . ':  ' . '<img src="' . get_the_post_thumbnail_url() . '" alt="" width="70px" height="50px"></p2><br><br>';
				echo the_content() . '</li>';
			}
			echo '</ul>';
		?>
<?php
			$big = 999999999; // need an unlikely integer
			// echo paginate_links(array(
			// 	'base' => str_replace($big, '%#%', get_pagenum_link($big)),
			// 	'format' => '?paged=%#%',
			// 	'current' => max(1, get_query_var('paged')),
			// 	'total' => $cars_query->max_num_pages,

			// ));





			// $big = 999999999;
			// $listString = paginate_links(array(
			// 	'base' => str_replace($big, '%#%', get_pagenum_link($big)),
			// 	'format' => '?paged=%#%',
			// 	'current' => max(1, get_query_var('paged')),
			// 	'total' => $cars_query->max_num_pages,
			// 	'prev_text'    => __('← Previous'),
			// 	'next_text'    => __('Next  →'),
			// 	'type'  => 'list',

			// ));

			// $listString = str_replace("<ul class='page-numbers'>", '<ul class="pagination">', $listString);
			// $listString = str_replace('page-numbers', 'page-link', $listString);
			// $listString = str_replace('<li>', '<li class="page-item">', $listString);
			// $listString = str_replace(
			// 	'<li class="page-item"><span aria-current="page" class="page-link current">',
			// 	'<li class="page-item active"><span aria-current="page" class="page-link">',
			// 	$listString
			// );


			// echo $listString;


			$max_pages = $cars_query->max_num_pages;

			$current_page = max(1, get_query_var('paged'));

			echo '<div class="custom-pagination text-center">';

			if ($current_page > 1) {
				echo '<a href="' . get_pagenum_link($current_page - 1) . '"><i class="bi-arrow-left-square-fill prev-arr m-1"></i></a>';
			}

			for ($i = 1; $i <= $max_pages; $i++) {;
				if ($i === $current_page) {
					echo '<span class="current">' . $i . '</span>';
				} else {
					echo '<a class="page-item m-1" href="' . get_pagenum_link($i) . '">' . $i . '</a>';
				}
			}
			if ($current_page < $max_pages) {
				echo '<a href="' . get_pagenum_link($current_page + 1) . '"><i class="bi-arrow-right-square-fill next-arr m-1"></i></a>';
			}

			echo '</div>';


			wp_reset_postdata(); // Reset post data query
		} else {
			echo 'No cars found';
		}
	}
}
