<?php
/*
* ----------------------------------------------------
* @author: fr0zen
* @author URI: https://fr0zen.store
* @copyright: (c) 2022 Vincenzo Piromalli. All rights reserved
* ----------------------------------------------------
* @since 3.8.7
* 20 May 2022
*/

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*====================================*\
	sidebar
\*====================================*/

function moviewp_widgets_init() {

	register_sidebar( array(
		'name'          => 'Sidebar',
		'id'            => 'left_1',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );

}
add_action( 'widgets_init', 'moviewp_widgets_init' );

/*====================================*\
	custom link widget
\*====================================*/

class MoviewpCustomLink extends WP_Widget {

	public function __construct() {

		parent::__construct( false, 'Custom Link', array(
			'description' => 'Displays custom link with icons on Moviewp left sidebar'
		));

	}

	public function widget( $args, $instance ) {

		extract( $args );

		$title        = apply_filters( 'widget_title', $instance['title'] );
		$content      = $instance['content'];
		$link_content = $instance['link_content'];
		$link_url     = $instance['link_url'];

		echo $before_widget;

		if ( $title )
		echo 
'<li><a href="'.$link_content.'">'.$content.'<span>'.$title.'</span></a></li>
';
		echo $after_widget;
	}

	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['title']        = strip_tags( $new_instance['title'] );
		$instance['content']      = $new_instance['content'];
		$instance['link_content'] = strip_tags( $new_instance['link_content'] );
		$instance['link_url']     = strip_tags( $new_instance['link_url'] );

		return $instance;
	}

	public function form( $instance ) {

		$defaults = array(
			'title'        => '',
			'content'      => '',
			'link_content' => '',
			'link_url'     => '',
		);
		$instance = wp_parse_args( (array)$instance, $defaults );

		$links = array();
		$pages = get_pages();

		foreach ( $pages as $page ) {
			$links[$page->ID] = array(
				'title' => $page->post_title,
				'url'   => get_permalink( $page->ID )
			);
		} ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:<br><span style="font-size:10px;">for example: <code>Contact us</code></span></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'content' ); ?>">Icon: <br><span style="font-size:10px;">for example: <code class="html"><span class="nt">&lt;i</span> <span class="na">class=</span><span class="s">"fa fa-envelope"</span><span class="nt">&gt;&lt;/i&gt;</span>
</code><br>(find more icons <a target="_blank" href="https://fontawesome.com/v4.7.0/icons/">here</a> )</span></label>
			<textarea id="<?php echo $this->get_field_id( 'content' ); ?>" name="<?php echo $this->get_field_name( 'content' ); ?>" style="width:100%;" cols="8"><?php echo $instance['content']; ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'link_content' ); ?>">Link:<br><span style="font-size:10px;">for example: <code><?php echo esc_url( home_url() ); ?>/contact/</code></span></label>
			<input id="<?php echo $this->get_field_id( 'link_content' ); ?>" name="<?php echo $this->get_field_name( 'link_content' ); ?>" value="<?php echo $instance['link_content']; ?>" style="width:100%;" />
		</p>
  <?php
	}
}

add_action( 'widgets_init', 'register_sidebar_widgets' );
function register_sidebar_widgets() {

	register_widget( 'MoviewpCustomLink' );
}