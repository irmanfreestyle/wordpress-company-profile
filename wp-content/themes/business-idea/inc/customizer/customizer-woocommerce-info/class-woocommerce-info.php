<?php
if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}

class business_idea_Woocommerce_Info extends WP_Customize_Control {
	
	public function enqueue() {
		business_idea_Plugin_Install_Helper::instance()->enqueue_scripts();
	}

	public function render_content() {
		
		echo '<h2>Webdzier Companion</h2>';		
		if ( function_exists('webdzierc_init') ) {
			printf(
				esc_html__( 'Now you should be able to see the team and testimonial sections on your front-page. You can configure settings from %s, in your WordPress admin dashboard.', 'business-idea' ),
				sprintf( '<b>%s</b>', esc_html__( 'Dashboard > Apprearance >> Customize', 'business-idea' ) )
			);
		} else {
			printf(
				esc_html__( 'To access team and testimonial sections in front page, you need to install and activate the %s plugin.','business-idea' ),
				esc_html( 'webdzier companion' )
			);
			echo $this->create_plugin_install_button('webdzier-companion');			
		}
		echo '<br/><hr>';
		
		echo '<h2>Woocommerce Plugin</h2>';
		if ( class_exists( 'woocommerce' ) ) {
			printf(
				esc_html__( 'You should be able to see the shop section on your front-page. You can configure settings from %s, in your WordPress dashboard.', 'business-idea' ),
				sprintf( '<b>%s</b>', esc_html__( 'Woocommerce > Settings', 'business-idea' ) )
			);
		} else {
			printf(
				esc_html__( 'To access shop section in front page, you need to install and activate the %s plugin.','business-idea' ),
				esc_html( 'woocommerce' )
			);
			echo $this->create_plugin_install_button('woocommerce');
		}
	}
	public function create_plugin_install_button( $slug ) {
		return business_idea_Plugin_Install_Helper::instance()->get_button_html( $slug );
	}
}