<?PHP
 
function getGallerySource($themeid){
	
		$RP_themeid = $themeid;
		global $wpdb;
		//For Debug only: $wpdb->show_errors();
		
		// Include Source from Photogallerie pimped with Settings from DB
		$table_name = $wpdb->prefix.'bwg_option';
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
			//table not in database. Create new table Free Version
			$RP_thumb_width = 180;
			$RP_thumb_height = 90; 
			$RP_open_with_fullscreen = 0;
			$RP_open_with_autoplay = 0;
			$RP_image_width = 800; 
			$RP_image_height = 500; 
			$RP_image_effect = "fade";
			$RP_enable_image_filmstrip = 1; 
			$RP_image_filmstrip_height = 50;
			$RP_enable_image_ctrl_btn = 1;
			$RP_enable_image_fullscreen = 1;
			$RP_popup_enable_info = 1;
			$RP_popup_info_always_show = 0;
			$RP_popup_info_full_width = 0;
			$RP_popup_hit_counter = 1;
			$RP_popup_enable_rate = 0;
			$RP_slideshow_interval = 5;
			$RP_enable_comment_social = 0;
			$RP_enable_image_facebook = 0;
			$RP_enable_image_twitter = 0;
			$RP_enable_image_google = 0;
			$RP_enable_image_ecommerce = 0;
			$RP_enable_image_pinterest = 0;
			$RP_enable_image_tumblr = 0;
			$RP_watermark_type = "none";
			$RP_slideshow_effect_duration = 1;
		}
		else{
			//Pro Version Options Table exist
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
		}
		
				
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
	
}

function getRandomPicture(){
		
		global $wpdb;
		//For Debug only: $wpdb->show_errors();
		
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
}


?>