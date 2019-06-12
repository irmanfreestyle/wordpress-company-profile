<?php
/**
 * The theme info for the frontpage sections
 *
 * Pro customizer section.
 *
 */

$display_upsells = business_idea_ready_for_upsells();
$define_classs = class_exists( 'WP_Customize_Control' ) && $display_upsells === true && ! class_exists( 'business_idea_Customizer_Theme_Info_Section' );
if ( $define_classs ) :
	/**
	 * Class webdzier_Section_Upsell
	 */
	class business_idea_Customizer_Theme_Info_Section extends WP_Customize_Section {

		/**
		 * The type of customize section being rendered.
		 *
		 * @access public
		 * @var    string
		 */
		public $type = 'business-theme-info-section';

		/**
		 * Upsell text to output.
		 *
		 * @access public
		 * @var    string
		 */
		public $upsell_text = '';

		/**
		 * Button text to output.
		 *
		 * @access public
		 * @var    string
		 */
		public $button_text = '';

		/**
		 * Button link to output.
		 *
		 * @access public
		 * @var    string
		 */
		public $button_url = '#';

		/**
		 * List of theme options to output.
		 *
		 * @access public
		 * @var    array
		 */
		public $options = array();

		/**
		 * List of additional explanations to output.
		 *
		 * @access public
		 * @var    array
		 */
		public $explained_features = array();


		/**
		 * Label text to output.
		 *
		 * @access public
		 * @var    string
		 */
		public $pro_label = 'pro';

		/**
		 * business_idea_Customizer_Theme_Info_Section constructor.
		 */
		public function __construct( WP_Customize_Manager $manager, $id, array $args ) {
			$manager->register_section_type( 'business_idea_Customizer_Theme_Info_Section' );
			parent::__construct( $manager, $id, $args );

		}

		/**
		 * Add custom parameters to pass to the JS via JSON.
		 *
		 * @access public
		 */
		public function json() {
			$json                       = parent::json();
			$json['button_text']        = esc_html( $this->button_text );
			$json['button_url']         = esc_url( $this->button_url );
			$json['options']            = $this->options;
			$json['explained_features'] = $this->explained_features;
			$json['pro_label']          = esc_html( $this->pro_label );

			return $json;
		}

		/**
		 * Outputs the Underscore.js template.
		 *
		 * @access public
		 * @return void
		 */
		protected function render_template() {
		?>
			<div class="webdzier-upsell webdzier-boxed-section">
				<# if ( data.options.length > 0 ) { #>
					<ul class="webdzier-upsell-features">
						<# for (option in data.options) { #>
							<li><span class="upsell-pro-label">{{ data.pro_label }}</span>{{ data.options[option] }}
							</li>
							<# } #>
					</ul>
					<# } #>

						<# if ( data.button_text && data.button_url ) { #>
							<a target="_blank" href="{{ data.button_url }}" class="button button-primary" target="_blank">{{
								data.button_text }}</a>
							<# } #>

								<# if ( data.explained_features.length > 0 ) { #>
									<hr>
									<ul class="webdzier-upsell-feature-list">
										<# for (feature in data.explained_features) { #>
											<li>* {{ data.explained_features[feature] }}</li>
											<# } #>
									</ul>
									<# } #>
			</div>
		<?php
		}
	}
endif;
