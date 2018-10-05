<?php
class MaxParallax extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'max_parallax', // Base ID
			esc_html__( 'Max Parallax', 'mw_domain' ), // Name
			array( 'description' => esc_html__( 'Parallax background', 'mw_domain' ), ) // Args
		);
		$this->defaults = array(
			'title'         => '',
			'body_content'  => '',
			'image' => ''
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		// Widget content
		?>
		<div
			class="parallax--bg"
			style="background-image:url(<?php echo $instance['image']; ?>)">

			<div>
				<h2 class="my_widget_title">
					<?php echo $instance['title'] ?>
				</h2>

				<p class="body_content">
					<?php echo $instance['body_content']; ?>
				</p>
			</div>
		</div>

		<?php
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'mw_domain' );
		$body_content = ! empty( $instance['body_content'] ) ? $instance['body_content'] : esc_html__( '' );
		$image = ! empty( $instance['image'] ) ? $instance['image'] : esc_html__( '' );
		?>
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
				<?php esc_attr_e( 'Title:', 'mw_domain' ); ?>
			</label> 
			<input
				class="widefat"
				id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
				name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
				type="text"
				value="<?php echo esc_attr( $title ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'body_content' ) ); ?>">
				<?php esc_attr_e( 'Body Content:', 'mw_domain' ); ?>
			</label> 
			<input
				class="widefat"
				id="<?php echo esc_attr( $this->get_field_id( 'body_content' ) ); ?>"
				name="<?php echo esc_attr( $this->get_field_name( 'body_content' ) ); ?>"
				type="text"
				value="<?php echo esc_attr( $body_content ); ?>">
		</p>

		<!-- Access media for image -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'image' ) ); ?>">
				<?php esc_attr_e( 'Image:', 'mw_domain' ); ?>
			</label> 
			<input
				class="widefat"
				id="<?php echo esc_attr( $this->get_field_id( 'image' ) ); ?>"
				name="<?php echo esc_attr( $this->get_field_name( 'image' ) ); ?>"
				type="text"
				value="<?php echo esc_attr( $image ); ?>" />
			<button class="button button-primary upload_image_button">Upload Image</button>
		</p>
		
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['body_content'] = ( ! empty( $new_instance['body_content'] ) ) ? sanitize_text_field( $new_instance['body_content'] ) : '';
		$instance['image'] = ( ! empty( $new_instance['image'] ) ) ? sanitize_text_field( $new_instance['image'] ) : '';
		

		return $instance;
	}

} // class Foo_Widget