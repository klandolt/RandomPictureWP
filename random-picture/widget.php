<?php
class RandomPicture_widget extends WP_Widget {

	function RandomPicture_widget() {
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
		
		global $wpdb; 
		//For Debug only: $wpdb->show_errors();
		
		// Include Source from Photogallerie pimped with Settings from DB
		$RP_themeid   = (int) $instance['themeid'];
		
		$RP_Optionen = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}bwg_option LIMIT 0,1");
		$RP_thumb_width = $RP_Optionen[0]->thumb_width;
		$RP_thumb_height = $RP_Optionen[0]->thumb_height; 
		$RP_open_with_fullscreen = $RP_Optionen[0]->popup_fullscreen;
		$RP_open_with_autoplay = $RP_Optionen[0]->popup_autoplay;
		$RP_image_width = $RP_Optionen[0]->popup_width; 
		$RP_image_height = $RP_Optionen[0]->popup_height; 
		$RP_image_effect = $RP_Optionen[0]->popup_type;
		$RP_enable_image_filmstrip = $RP_Optionen[0]->popup_enable_filmstrip; 
		$RP_image_filmstrip_height = $RP_Optionen[0]->popup_filmstrip_height;
		$RP_enable_image_ctrl_btn = $RP_Optionen[0]->popup_enable_ctrl_btn;
		$RP_enable_image_fullscreen = $RP_Optionen[0]->popup_enable_fullscreen;
		$RP_popup_enable_info = $RP_Optionen[0]->popup_enable_info;
		$RP_popup_info_always_show = $RP_Optionen[0]->popup_info_always_show;
		$RP_popup_info_full_width = $RP_Optionen[0]->popup_info_full_width;
		$RP_popup_hit_counter = $RP_Optionen[0]->popup_hit_counter;
		$RP_popup_enable_rate = $RP_Optionen[0]->popup_enable_rate;
		$RP_slideshow_interval = $RP_Optionen[0]->slideshow_interval;
		$RP_enable_comment_social = $RP_Optionen[0]->popup_enable_comment;
		$RP_enable_image_facebook = $RP_Optionen[0]->popup_enable_facebook;
		$RP_enable_image_twitter = $RP_Optionen[0]->popup_enable_twitter;
		$RP_enable_image_google = $RP_Optionen[0]->popup_enable_google;
		$RP_enable_image_ecommerce = $RP_Optionen[0]->popup_enable_ecommerce;
		$RP_enable_image_pinterest = $RP_Optionen[0]->popup_enable_pinterest;
		$RP_enable_image_tumblr = $RP_Optionen[0]->popup_enable_tumblr;
		$RP_watermark_type = $RP_Optionen[0]->watermark_type;
		$RP_slideshow_effect_duration = $RP_Optionen[0]->slideshow_effect_duration;
		
		echo " <script>
		function bwg_gallery_box_0(gallery_id, image_id, openEcommerce) {
			if (typeof openEcommerce == undefined) {
				openEcommerce = false;
			}
			var ecommerce = openEcommerce == true ? '&open_ecommerce=1' : '';
			var filterTags = jQuery('#bwg_tags_id_bwg_album_compact_0').val() ? jQuery('#bwg_tags_id_bwg_album_compact_0').val() : 0;
			var filtersearchname = jQuery('#bwg_search_input_0').val() ? jQuery('#bwg_search_input_0').val() : '';
			spider_createpopup('".site_url()."/wp-admin/admin-ajax.php?action=GalleryBox&current_view=0&theme_id=". $RP_themeid ."&thumb_width=". $RP_thumb_width ."&thumb_height=". $RP_thumb_height ."&open_with_fullscreen=". $RP_open_with_fullscreen ."&open_with_autoplay=". $RP_open_with_autoplay ."&image_width=". $RP_image_width ."&image_height=". $RP_image_height ."&image_effect=". $RP_image_effect ."&wd_sor=order&wd_ord=asc&enable_image_filmstrip=". $RP_enable_image_filmstrip ."&image_filmstrip_height=". $RP_image_filmstrip_height ."&enable_image_ctrl_btn=". $RP_enable_image_ctrl_btn ."&enable_image_fullscreen=". $RP_enable_image_fullscreen ."&popup_enable_info=". $RP_popup_enable_info ."&popup_info_always_show=". $RP_popup_info_always_show ."&popup_info_full_width=". $RP_popup_info_full_width ."&popup_hit_counter=". $RP_popup_hit_counter ."&popup_enable_rate=". $RP_popup_enable_rate ."&slideshow_interval=". $RP_slideshow_interval ."&enable_comment_social=". $RP_enable_comment_social ."&enable_image_facebook=". $RP_enable_image_facebook ."&enable_image_twitter=". $RP_enable_image_twitter ."&enable_image_google=". $RP_enable_image_google ."&enable_image_ecommerce=". $RP_enable_image_ecommerce ."&enable_image_pinterest=". $RP_enable_image_pinterest ."&enable_image_tumblr=". $RP_enable_image_tumblr ."&watermark_type=". $RP_watermark_type ."&slideshow_effect_duration=". $RP_slideshow_effect_duration ."&current_url=".site_url()."%2F&gallery_id=' + gallery_id + '&image_id=' + image_id + '&filter_tag_0=' + filterTags + ecommerce + '&filter_search_name_0=' + filtersearchname, '0', '0', '800', '500', 1, 'testpopup', 5, 'bottom');
		}
		var bwg_hash = window.location.hash.substring(1);
		if (bwg_hash) {
			if (bwg_hash.indexOf('bwg') != '-1') {
				bwg_hash_array = bwg_hash.replace('bwg', '').split('/');
				bwg_gallery_box_0(bwg_hash_array[0], bwg_hash_array[1]);
			}
		}
		function bwg_document_ready_0() {
			var bwg_touch_flag = false;
			jQuery('.bwg_lightbox_0').on('click', function () {
				if (!bwg_touch_flag) {
					bwg_touch_flag = true;
					setTimeout(function () {
						bwg_touch_flag = false;
					}, 100);
					bwg_gallery_box_0(jQuery(this).attr('data-gallery-id'), jQuery(this).attr('data-image-id'));
					return false;
				}
			});
			jQuery('.bwg_lightbox_0 .bwg_ecommerce').on('click', function (event) {
				event.stopPropagation();
				if (!bwg_touch_flag) {
					bwg_touch_flag = true;
					setTimeout(function () {
						bwg_touch_flag = false;
					}, 100);
					var image_id = jQuery(this).closest('.bwg_lightbox_0').attr('data-image-id');
					var gallery_id = jQuery(this).closest('.bwg_lightbox_0').attr('data-gallery-id');
					bwg_gallery_box_0(gallery_id, image_id, true);
					return false;
				}
			});
			jQuery('.bwg_album_0').on('click', function () {
				if (!bwg_touch_flag) {
					bwg_touch_flag = true;
					setTimeout(function () {
						bwg_touch_flag = false;
					}, 100);
					spider_frontend_ajax('gal_front_form_0', '0', 'bwg_album_compact_0', jQuery(this).attr('data-alb_gal_id'), '1', jQuery(this).attr('data-def_type'), '', jQuery(this).attr('data-title'), 'default');
					return false;
				}
			});
		}
		jQuery(document).ready(function () {
			bwg_document_ready_0();
		});
		</script>";
		// End Source from Photogallerie
		
		//Formating:
		echo "<aside id='widget_random_Picture' class='widget widget_random_Picture'>";
		
		$RP_title    = esc_attr( $instance['title'] );
		echo "<h3 class='widget-title'>". $RP_title ."</h3>";
		
		$RP_ergebnise = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}bwg_image WHERE `published` =1 ORDER BY RAND() LIMIT 0,1");	
		$RP_url = site_url()."/wp-content/uploads/photo-gallery";
		$RP_thumb_url = $RP_url.$RP_ergebnise[0]->thumb_url;
		$RP_id = $RP_ergebnise[0]->id;
		$RP_gallery_id = $RP_ergebnise[0]->gallery_id;
		$RP_image_url  = $RP_url.$RP_ergebnise[0]->image_url;
		$RP_alt  = $RP_ergebnise[0]->alt;
		
		echo "<a class='bwg_lightbox_0' href='". $RP_image_url ."' data-image-id='". $RP_id ."' data-gallery-id='". $RP_gallery_id ."'>";
		echo "<img style='visibility: visible;' class='bwg_masonry_thumb_0 bwg_img_clear bwg_img_custom' id='". $RP_id ."'src='". $RP_thumb_url ."' alt='". $RP_alt ."'>";
		echo "</a>";
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