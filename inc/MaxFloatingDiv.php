<?php
class MaxFloatingDiv extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'max_floating_div', // Base ID
			esc_html__( 'Max Floating Div', 'mw_domain' ), // Name
			array( 'description' => esc_html__( 'Block of text with above screen parallax effect.', 'mw_domain' ), ) // Args
		);
		$this->defaults = array(
			'title'         => '',
			'background'     => '',
			'body_content'  => '',
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
		<div>
			<div
				class="floating-div"
				style="background-color:<?php echo $instance['background']; ?>">

				<div>
					<h2 class="my_widget_title">
						<?php echo $instance['title'] ?>
					</h2>

					<p class="body_content">
						<?php echo $instance['body_content']; ?>
					</p>
				</div>
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
		$background = ! empty( $instance['background'] ) ? $instance['background'] : esc_html__( '' );
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

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'background' ) ); ?>">
				<?php esc_attr_e( 'Background:', 'mw_domain' ); ?>
			</label> 
			<input
				class="widefat"
				id="<?php echo esc_attr( $this->get_field_id( 'background' ) ); ?>"
				name="<?php echo esc_attr( $this->get_field_name( 'background' ) ); ?>"
				type="color"
				value="<?php echo esc_attr( $background ); ?>">
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
		$instance['background'] = ( ! empty( $new_instance['background'] ) ) ? sanitize_text_field( $new_instance['background'] ) : '';
		

		return $instance;
	}

} // class Foo_Widget