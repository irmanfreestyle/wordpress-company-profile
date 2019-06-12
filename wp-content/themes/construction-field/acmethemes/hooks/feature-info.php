<?php
/**
 * Display Feature Columns
 * @since Construction Field 1.0.0
 *
 * @return void
 *
 */
if ( !function_exists('construction_field_feature_info') ) :
	function construction_field_feature_info() {
		global $construction_field_customizer_all_values;
		$construction_field_feature_info_number = $construction_field_customizer_all_values['construction-field-feature-info-number'];
		echo '<div class="info-icon-box-wrapper">';
		$column = $number = $construction_field_feature_info_number;

		$construction_field_basic_info_data = array();

		$construction_field_first_info_icon = $construction_field_customizer_all_values['construction-field-first-info-icon'] ;
		$construction_field_first_info_title = $construction_field_customizer_all_values['construction-field-first-info-title'];
		$construction_field_first_info_desc = $construction_field_customizer_all_values['construction-field-first-info-desc'];
		$construction_field_basic_info_data[] = array(
			"icon"  => $construction_field_first_info_icon,
			"title" => $construction_field_first_info_title,
			"desc"  => $construction_field_first_info_desc
		);

		$construction_field_second_info_icon = $construction_field_customizer_all_values['construction-field-second-info-icon'] ;
		$construction_field_second_info_title = $construction_field_customizer_all_values['construction-field-second-info-title'];
		$construction_field_second_info_desc = $construction_field_customizer_all_values['construction-field-second-info-desc'];
		$construction_field_basic_info_data[] = array(
			"icon"  => $construction_field_second_info_icon,
			"title" => $construction_field_second_info_title,
			"desc"  => $construction_field_second_info_desc
		);

		$construction_field_third_info_icon = $construction_field_customizer_all_values['construction-field-third-info-icon'] ;
		$construction_field_third_info_title = $construction_field_customizer_all_values['construction-field-third-info-title'];
		$construction_field_third_info_desc = $construction_field_customizer_all_values['construction-field-third-info-desc'];
		$construction_field_basic_info_data[] = array(
			"icon"  => $construction_field_third_info_icon,
			"title" => $construction_field_third_info_title,
			"desc"  => $construction_field_third_info_desc
		);

		$construction_field_forth_info_icon = $construction_field_customizer_all_values['construction-field-forth-info-icon'] ;
		$construction_field_forth_info_title = $construction_field_customizer_all_values['construction-field-forth-info-title'];
		$construction_field_forth_info_desc = $construction_field_customizer_all_values['construction-field-forth-info-desc'];
		$construction_field_basic_info_data[] = array(
			"icon"  => $construction_field_forth_info_icon,
			"title" => $construction_field_forth_info_title,
			"desc"  => $construction_field_forth_info_desc
		);

		if( $column == 1 ){
			$col= "col-md-12";
		}
        elseif( $column == 2 ){
			$col= "col-md-6";
		}
        elseif( $column == 3 ){
			$col= "col-md-4";
		}
		else{
			$col= "col-md-3";
		}

		$col .= " init-animate zoomIn";

		$i=0;
		foreach ( $construction_field_basic_info_data as $base_basic_info_data) {
			if( $i >= $number ){
				break;
			}
			?>
            <div class="info-icon-box <?php echo esc_attr( $col );?>">
				<?php
				if( !empty( $base_basic_info_data['icon'])){
					?>
                    <div class="info-icon">
                        <i class="fa <?php echo esc_attr( $base_basic_info_data['icon'] );?>"></i>
                    </div>
					<?php
				}
				if( !empty( $base_basic_info_data['title']) || !empty( $base_basic_info_data['desc']) ){
					?>
                    <div class="info-icon-details">
						<?php
						if( !empty( $base_basic_info_data['title']) ){
							echo '<h6 class="icon-title">'.esc_html( $base_basic_info_data['title'] ).'</h6>';
						}
						if( !empty( $base_basic_info_data['desc']) ){
							echo '<span class="icon-desc">'.wp_kses_post( $base_basic_info_data['desc'] ).'</span>';
						}
						?>
                    </div>
					<?php
				}
				?>
            </div>
			<?php
			$i++;
		}
		echo "</div>";/*.infowrapper*/
	}
endif;
add_action( 'construction_field_action_feature_info', 'construction_field_feature_info', 20 );