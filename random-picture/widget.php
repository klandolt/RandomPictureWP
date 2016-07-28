<?php
class RandomPicture_widget extends WP_Widget {

	function RandomPicture_widget() {
		// Instantiate the parent object
		parent::__construct( false, 'RandomPicture_widget Titel' );
	}

	function widget( $args, $instance ) {
		// Widget output
		
		// Include Source from Photogallerie
		// Todo make more generic
		echo " <script>
		function bwg_gallery_box_0(gallery_id, image_id, openEcommerce) {
			if (typeof openEcommerce == undefined) {
				openEcommerce = false;
			}
			var ecommerce = openEcommerce == true ? '&open_ecommerce=1' : '';
			var filterTags = jQuery('#bwg_tags_id_bwg_album_compact_0').val() ? jQuery('#bwg_tags_id_bwg_album_compact_0').val() : 0;
			var filtersearchname = jQuery('#bwg_search_input_0').val() ? jQuery('#bwg_search_input_0').val() : '';
			spider_createpopup('".site_url()."/wp-admin/admin-ajax.php?action=GalleryBox&current_view=0&theme_id=3&thumb_width=180&thumb_height=90&open_with_fullscreen=0&open_with_autoplay=0&image_width=800&image_height=500&image_effect=fade&wd_sor=order&wd_ord=asc&enable_image_filmstrip=1&image_filmstrip_height=50&enable_image_ctrl_btn=1&enable_image_fullscreen=1&popup_enable_info=1&popup_info_always_show=0&popup_info_full_width=0&popup_hit_counter=0&popup_enable_rate=0&slideshow_interval=5&enable_comment_social=0&enable_image_facebook=1&enable_image_twitter=1&enable_image_google=1&enable_image_ecommerce=undefined&enable_image_pinterest=0&enable_image_tumblr=0&watermark_type=none&slideshow_effect_duration=1&current_url=".site_url()."%2F&gallery_id=' + gallery_id + '&image_id=' + image_id + '&filter_tag_0=' + filterTags + ecommerce + '&filter_search_name_0=' + filtersearchname, '0', '0', '800', '500', 1, 'testpopup', 5, 'bottom');
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
		// End
		
		echo "<h3 class='widget-title'>Zufallsbild</h3>";
		
		global $wpdb; 
		$wpdb->show_errors();
		
		$RandPict_ergebnise = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}bwg_image WHERE `published` =1 ORDER BY RAND() LIMIT 1,1");
				
		$RandPict_url = site_url()."/wp-content/uploads/photo-gallery";
		$RandPict_thumb_url = $RandPict_url.$RandPict_ergebnise[0]->thumb_url;
		$RandPict_id = $RandPict_ergebnise[0]->id;
		$RandPict_gallery_id = $RandPict_ergebnise[0]->gallery_id;
		$RandPict_image_url  = $RandPict_url.$RandPict_ergebnise[0]->image_url;
		$RandPict_alt  = $RandPict_ergebnise[0]->alt;
		
		
		echo "<a class='bwg_lightbox_0' href='". $RandPict_image_url ."' data-image-id='". $RandPict_id ."' data-gallery-id='". $RandPict_gallery_id ."'>";
		echo "<img style='visibility: visible;' class='bwg_masonry_thumb_0 bwg_img_clear bwg_img_custom' id='". $RandPict_id ."'src='". $RandPict_thumb_url ."' alt='". $RandPict_alt ."'>";
		echo "</a>";

	}

	function update( $new_instance, $old_instance ) {
		// Save widget options
	}

	function form( $instance ) {
		// Output admin widget options form
	}
}

function RandomPicture_widgets() {
	register_widget( 'RandomPicture_widget' );
}

add_action( 'widgets_init', 'RandomPicture_widgets' );


?>