<?php 
defined( 'ABSPATH' ) or die();

if ( class_exists( 'WP_Customize_Control' ) ) :
	class enigma_Customizer_testimonial_fields_new extends WP_Customize_Control {

		public function render_content() {
			?>
			<div class="wl_agm destination_block">
				<label>
					<span class="customize-control-title"><?php esc_html_e( $this->label ,WL_COMPANION_DOMAIN); ?></span>
					<?php if ( ! empty( $this->description ) ) : ?>
					<span class="description customize-control-description"><?php esc_html_e( $this->description,WL_COMPANION_DOMAIN ); ?></span>
					<?php endif; ?>
				</label>
				<form id="wl-ext-form-destination" method="post">
					<div id="input_fields_wrap-destination">
						<?php 
								if ( ! empty ( get_theme_mod( 'enigma_testimonial_data') ) )  {
									$name_arr = unserialize(get_theme_mod( 'enigma_testimonial_data'));
									foreach ( $name_arr as $key => $value ) {
									?>
										<div class="wl-dynamic-fields">
											<div class="form-group">
												<label for="title" class="col-form-label wl-txt-label"><?php esc_html_e ( 'Name', WL_COMPANION_DOMAIN ); ?></label>
												<input type="text" class="form-control" id="testimonial_name-<?php esc_attr_e($key,WL_COMPANION_DOMAIN); ?>" name="testimonial_name-<?php esc_attr_e($key,WL_COMPANION_DOMAIN); ?>" placeholder="<?php esc_html_e( 'Enter Name', WL_COMPANION_DOMAIN ); ?>" value="<?php if ( ! empty ( $value['testimonial_name'] ) ) {  esc_attr_e($value['testimonial_name'],WL_COMPANION_DOMAIN); } ?>" >
											</div>
											<div class="form-group">
												<label for="testimonial_desc-<?php esc_attr_e($key,WL_COMPANION_DOMAIN); ?>" class="col-form-label wl-txt-label"><?php esc_html_e( 'Description', WL_COMPANION_DOMAIN ); ?></label>
												<textarea class="form-control" rows="5" id="testimonial_desc-<?php esc_attr_e($key,WL_COMPANION_DOMAIN); ?>" name="testimonial_desc-<?php esc_attr_e($key,WL_COMPANION_DOMAIN); ?>" placeholder="Description"><?php if ( ! empty ( $value['testimonial_desc'] ) ) { echo esc_textarea($value['testimonial_desc']); } ?></textarea>
											</div>
											<div class="form-group">
												<?php if ( ! empty ( $value['testimonial_image'] ) ) { ?>
													<img class="wl-upload-img-tag" src="<?php echo esc_url($value['testimonial_image']); ?>"><br>
												<?php }?>
												<label for="testimonial_image-<?php esc_attr_e($key,WL_COMPANION_DOMAIN); ?>" class="col-form-label wl-txt-label"><?php esc_html_e( 'Picture', WL_COMPANION_DOMAIN ); ?></label>
												<input type="text" name="testimonial_image-<?php esc_attr_e($key,WL_COMPANION_DOMAIN); ?>" id="testimonial_image-<?php esc_attr_e($key,WL_COMPANION_DOMAIN); ?>" class="form-control testimonial_image" value="<?php if ( ! empty ( $value['testimonial_image'] ) ) { esc_attr_e($value['testimonial_image'],WL_COMPANION_DOMAIN); } ?>" >
												<input type="button" name="upload-btn" class="button-secondary button upload_image_btn upload_testimonial_c" id="upload_desti-<?php esc_attr_e($key,WL_COMPANION_DOMAIN); ?>" value="Upload">
											</div>
											<div class="form-group">
												<label for="testimonial_designation" class="col-form-label wl-txt-label"><?php esc_html_e( 'Designation', WL_COMPANION_DOMAIN ); ?></label>
												<input type="text" class="form-control" id="testimonial_designation-<?php esc_attr_e($key,WL_COMPANION_DOMAIN); ?>" name="testimonial_designation-<?php esc_attr_e($key,WL_COMPANION_DOMAIN); ?>" placeholder="<?php esc_html_e( '4 Days-5 Nights', WL_COMPANION_DOMAIN ); ?>" value="<?php if ( ! empty ( $value['testimonial_designation'] ) ) { esc_attr_e($value['testimonial_designation'],WL_COMPANION_DOMAIN); } ?>" >
											</div>
											<a href="#" class="btn btn-danger btn-sm remove_field"><?php esc_html_e( 'Remove', WL_COMPANION_DOMAIN ); ?></a>
										</div>
									<?php
									}
								}
						?>
					</div>
					<button class='btn btn-success add_field_button' id="add_field_button-destination"><?php esc_html_e( 'Add Testimonial', WL_COMPANION_DOMAIN ); ?></button></br>
					<button type="button" class="btn btn-success add_field_button wl-companion-submit-btn" id="wl-ext-submit-destination"><?php esc_html_e( 'Save', WL_COMPANION_DOMAIN ); ?></button>
				</form>
			</div>
		<?php
		}
	}
endif;
?>