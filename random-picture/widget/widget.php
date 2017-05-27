<?php
/* 
	File for widget settings
*/

class RandomPicture_widget extends WP_Widget {

	function __construct() {
		// Instantiate the parent object
		parent::__construct( false, 'Zufallsbild Widget' );
		$widget_ops = array(
			'classname' => 'random_picture',
			'description' => 'Zufallsbild aus Photo Gallerie von WebDorado.'
		);
		// Widget Control Settings.
		$control_ops = array('id_base' => 'random_picture');
		// Create the widget.
		parent::__construct('random_picture', 'Zufallsbild Widget', $widget_ops, $control_ops);
	}

	function widget( $args, $instance ) {
		// Widget output
		
		$themeid   = (int) $instance['themeid'];
		getGallerySource($themeid);
		
		//Formating:
		echo "<aside id='widget_random_Picture' class='widget widget_random_Picture'>";
		
		$RP_title    = esc_attr( $instance['title'] );
		echo "<h3 class='widget-title'>". $RP_title ."</h3>";
		
		getRandomPicture();
		
		echo "</aside>";
	}

	function update( $new_instance, $old_instance ) {
		// Save widget options
	    $instance = $old_instance;
		$instance['title']      = strip_tags( $new_instance['title'] );
		$instance['themeid']     = (int) $new_instance['themeid'];
      return $instance;
	}

	function form( $instance ) {
		// Output admin widget options form
		global $wpdb;
              // Defaults
              $instance = wp_parse_args( 
              	(array) $instance, array(
                  	'title' => 'Zufallsbild',
                  	'themeid' => 1                 
              	) 
              );
              // Values
              $RP_title    = esc_attr( $instance['title'] );
			$RP_themeid   = (int) $instance['themeid'];
            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>">Titel:</label>
                <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $RP_title; ?>" size="25" />
            </p>
               <p>
                <label for="<?php echo $this->get_field_id( 'themeid' ); ?>">Theme-ID:</label>
                <input type="text" id="<?php echo $this->get_field_id( 'themeid' ); ?>" name="<?php echo $this->get_field_name( 'themeid' ); ?>" value="<?php echo $RP_themeid; ?>" size="5" />
            </p>
<?php
	}
}

	function RandomPicture_widgets() {
		register_widget( 'RandomPicture_widget' );
}

	add_action( 'widgets_init', 'RandomPicture_widgets' );

?>