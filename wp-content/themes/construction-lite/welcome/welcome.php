<?php
	if(!class_exists('construction_lite_Welcome')) :

		class construction_lite_Welcome {

			public $tab_sections = array();

			public $theme_name = ''; // For storing Theme Name
			public $theme_version = ''; // For Storing Theme Current Version Information
			public $documentation_link = ''; // Theme Documentation Link
			public $free_plugins = array(); // For Storing the list of the Recommended Free Plugins
			public $pro_plugins = array(); // For Storing the list of the Recommended Pro Plugins
			public $req_plugins = array(); // For Storing the list of the Required Plugins
			public $companion_plugins = array(); // For Storing the list of the Companion Plugins

			/**
			 * Constructor for the Welcome Screen
			 */
			public function __construct() {

				/** Useful Variables **/
				$theme = wp_get_theme();
				$this->theme_name = $theme->Name;
				$this->theme_version = $theme->Version;

				/** Define Tabs Sections **/
				$this->tab_sections = array(
					'getting_started' => esc_html__('Getting Started', 'construction-lite'),
					'recommended_plugins' => esc_html__('Recommended Plugins', 'construction-lite'),
					'support' => esc_html__('Support', 'construction-lite'),
					'free_vs_pro' => esc_html__('Free Vs Pro', 'construction-lite'),
					'more_wp_stuff' => esc_html__('More WordPress Stuff', 'construction-lite'),
				);

				/** List of Recommended Free Plugins **/
				$this->free_plugins = array(

					'accesspress-twitter-feed' => array(
						'slug' => 'accesspress-twitter-feed',
						'filename' => 'accesspress-twitter-feed.php',
						'class' => 'APTF_Class'
					),

					'accesspress-social-icons' => array(
						'slug' => 'accesspress-social-icons',
						'filename' => 'accesspress-social-icons.php',
						'class' => 'APS_Class'
					),

					'ultimate-form-builder-lite' => array(
						'slug' => 'ultimate-form-builder-lite',
						'filename' => 'ultimate-form-builder-lite.php',
						'class' => 'UFBL_Class'
					),
				);

				/** Links **/

				/* Create a Welcome Page */
				add_action( 'admin_menu', array( $this, 'construction_lite_welcome_register_menu' ) );

				/* Enqueue Styles & Scripts for Welcome Page */
				add_action( 'admin_enqueue_scripts', array( $this, 'construction_lite_welcome_styles_and_scripts' ) );

				/** Plugin Installation Ajax **/
				add_action( 'wp_ajax_construction_lite_plugin_installer', array( $this, 'construction_lite_plugin_installer_callback' ) );

				/** Plugin Installation Ajax **/
				add_action( 'wp_ajax_construction_lite_plugin_offline_installer', array( $this, 'construction_lite_plugin_offline_installer_callback' ) );

				/** Plugin Activation Ajax **/
				add_action( 'wp_ajax_construction_lite_plugin_activation', array( $this, 'construction_lite_plugin_activation_callback' ) );

				/** Plugin Activation Ajax (Offline) **/
				add_action( 'wp_ajax_construction_lite_plugin_offline_activation', array( $this, 'construction_lite_plugin_offline_activation_callback' ) );

				add_action( 'init', array( $this, 'get_required_plugin_notification' ));

			}

			public function get_required_plugin_notification() {

				$req_plugins = $this->companion_plugins;
				$notif_counter = count($this->companion_plugins);
				$construction_lite_plugin_installed_notif = get_option('construction_lite_plugin_installed_notif');

				foreach($req_plugins as $plugin) {
					$folder_name = $plugin['slug'];
					$file_name = $plugin['filename'];
					$path = WP_PLUGIN_DIR.'/'.esc_attr($folder_name).'/'.esc_attr($file_name);
					if(file_exists( $path )) {
						if(is_plugin_active($folder_name.'/'.$file_name)) {
							$notif_counter--;
						}
					}
				}
				update_option('construction_lite_plugin_installed_notif', absint($notif_counter));
				return $notif_counter;
			}

			/** Register Menu for Welcome Page **/
			public function construction_lite_welcome_register_menu() {
				$action_count = get_option('construction_lite_plugin_installed_notif');
				$title        = $action_count > 0 ? esc_html__( 'Welcome', 'construction-lite' ) . '<span class="badge pending-tasks">' . esc_html( $action_count ) . '</span>' : esc_html__( 'Welcome', 'construction-lite' );
				add_theme_page( 'Welcome', $title , 'edit_theme_options', 'construction-welcome', array( $this, 'construction_lite_welcome_screen' ));
			}

			/** Welcome Page **/
			public function construction_lite_welcome_screen() {
				$tabs = $this->tab_sections;

				$current_section = isset($_GET['section']) ? sanitize_text_field( wp_unslash( $_GET['section'] ) ) : 'getting_started';
				$section_inline_style = '';
				?>
				<div class="wrap about-wrap access-wrap">
					<h1><?php /* translators: %1$s : theme name, %2$s : theme version */ printf( esc_html__( 'Welcome to %1$s - Version %2$s', 'construction-lite' ), esc_html($this->theme_name), esc_html($this->theme_version) ); ?></h1>
					<div class="about-text"><?php /* translators: %s : theme name */ printf( esc_html__( 'The %s is full fledged WordPress theme for construction or business building website. Besides, it is elegantly designed to be used for multi purposes like business, corporates, eCommerce, personal or other creative agencies site. It is well optimized considering powerful features and functionalities along with simplicity.', 'construction-lite' ), esc_html($this->theme_name) ); ?></div>

					<a target="_blank" href="http://www.accesspressthemes.com" class="accesspress-badge wp-badge"><span><?php echo esc_html('AccessPressThemes'); ?></span></a>

				<div class="nav-tab-wrapper clearfix">
					<?php foreach($tabs as $id => $label) : ?>
						<?php
							$section = isset($_REQUEST['section']) ? sanitize_text_field( wp_unslash( $_REQUEST['section'] ) ) : 'getting_started';
							$nav_class = 'nav-tab';
							if($id == $section) {
								$nav_class .= ' nav-tab-active';
							}
						?>
						<a href="<?php echo esc_url(admin_url('themes.php?page=construction-welcome&section='.$id)); ?>" class="<?php echo esc_attr($nav_class); ?>" >
							<?php echo esc_html( $label ); ?>
							<?php if($id == 'actions_required') : $not = $this->get_required_plugin_notification(); ?>
								<?php if($not) : ?>
							   		<span class="pending-tasks">
						   				<?php echo esc_html($not); ?>
						   			</span>
				   				<?php endif; ?>
						   	<?php endif; ?>
					   	</a>
					<?php endforeach; ?>
			   	</div>

		   		<div class="welcome-section-wrapper">
	   				<?php $section = isset($_REQUEST['section']) ? sanitize_text_field( wp_unslash( $_REQUEST['section'] ) ) : 'getting_started'; ?>

   					<div class="welcome-section <?php echo esc_attr($section); ?> clearfix">
   						<?php require_once get_template_directory() . '/welcome/sections/'.esc_html($section).'.php'; ?>
					</div>
			   	</div>
			   	</div>
				<?php
			}

			/** Enqueue Necessary Styles and Scripts for the Welcome Page **/
			public function construction_lite_welcome_styles_and_scripts() {
				wp_enqueue_style( 'construction-welcome-screen', get_template_directory_uri() . '/welcome/css/welcome.css' );
				wp_enqueue_script( 'construction-welcome-screen', get_template_directory_uri() . '/welcome/js/welcome.js', array( 'jquery' ) );

				wp_localize_script( 'construction-welcome-screen', 'constructionWelcomeObject', array(
					'admin_nonce'	=> wp_create_nonce('construction_lite_plugin_installer_nonce'),
					'activate_nonce'	=> wp_create_nonce('construction_lite_plugin_activate_nonce'),
					'ajaxurl'		=> esc_url( admin_url( 'admin-ajax.php' ) ),
					'activate_btn' => esc_html__('Activate', 'construction-lite'),
					'installed_btn' => esc_html__('Activated', 'construction-lite'),
					'demo_installing' => esc_html__('Installing Demo', 'construction-lite'),
					'demo_installed' => esc_html__('Demo Installed', 'construction-lite'),
					'demo_confirm' => esc_html__('Are you sure to import demo content ?', 'construction-lite'),
				) );
			}

			/** Plugin API **/
			public function construction_lite_call_plugin_api( $plugin ) {
				include_once ABSPATH . 'wp-admin/includes/plugin-install.php';

				$call_api = plugins_api( 'plugin_information', array(
					'slug'   => $plugin,
					'fields' => array(
						'downloaded'        => false,
						'rating'            => false,
						'description'       => false,
						'short_description' => true,
						'donate_link'       => false,
						'tags'              => false,
						'sections'          => true,
						'homepage'          => true,
						'added'             => false,
						'last_updated'      => false,
						'compatibility'     => false,
						'tested'            => false,
						'requires'          => false,
						'downloadlink'      => false,
						'icons'             => true
					)
				) );

				return $call_api;
			}

			/** Check For Icon **/
			public function construction_lite_check_for_icon( $arr ) {
				if ( ! empty( $arr['svg'] ) ) {
					$plugin_icon_url = $arr['svg'];
				} elseif ( ! empty( $arr['2x'] ) ) {
					$plugin_icon_url = $arr['2x'];
				} elseif ( ! empty( $arr['1x'] ) ) {
					$plugin_icon_url = $arr['1x'];
				} else {
					$plugin_icon_url = $arr['default'];
				}

				return $plugin_icon_url;
			}

			/** Check if Plugin is active or not **/
			public function construction_lite_plugin_active($plugin) {
				$folder_name = $plugin['slug'];
				$file_name = $plugin['filename'];
				$status = 'install';

				$path = WP_PLUGIN_DIR.'/'.esc_attr($folder_name).'/'.esc_attr($file_name);

				if(file_exists( $path )) {
					$status = is_plugin_active(esc_attr($folder_name).'/'.esc_attr($file_name)) ? 'inactive' : 'active';
				}

				return $status;
			}

			/** Generate Url for the Plugin Button **/
			public function construction_lite_plugin_generate_url($status, $plugin) {
				$folder_name = $plugin['slug'];
				$file_name = $plugin['filename'];

				switch ( $status ) {
					case 'install':
						return wp_nonce_url(
							add_query_arg(
								array(
									'action' => 'install-plugin',
									'plugin' => esc_attr($folder_name)
								),
								network_admin_url( 'update.php' )
							),
							'install-plugin_' . esc_attr($folder_name)
						);
						break;

					case 'inactive':
						return add_query_arg( array(
							                      'action'        => 'deactivate',
							                      'plugin'        => rawurlencode( esc_attr($folder_name) . '/' . esc_attr($file_name) . '.php' ),
							                      'plugin_status' => 'all',
							                      'paged'         => '1',
							                      '_wpnonce'      => wp_create_nonce( 'deactivate-plugin_' . esc_attr($folder_name) . '/' . esc_attr($file_name) . '.php' ),
						                      ), network_admin_url( 'plugins.php' ) );
						break;

					case 'active':
						return add_query_arg( array(
							                      'action'        => 'activate',
							                      'plugin'        => rawurlencode( esc_attr($folder_name) . '/' . esc_attr($file_name) . '.php' ),
							                      'plugin_status' => 'all',
							                      'paged'         => '1',
							                      '_wpnonce'      => wp_create_nonce( 'activate-plugin_' . esc_attr($folder_name) . '/' . esc_attr($file_name) . '.php' ),
						                      ), network_admin_url( 'plugins.php' ) );
						break;
				}
			}

			/* ========== Plugin Installation Ajax =========== */
			public function construction_lite_plugin_installer_callback(){

				if ( ! current_user_can('install_plugins') )
					wp_die( esc_html__( 'Sorry, you are not allowed to install plugins on this site.', 'construction-lite' ) );

				$nonce = isset( $_POST["nonce"] ) ? sanitize_text_field( wp_unslash( $_POST["nonce"] ) ) : '';
				$plugin = isset( $_POST["plugin"] ) ? sanitize_text_field( wp_unslash( $_POST["plugin"] ) ) : '';
				$plugin_file = isset( $_POST["plugin_file"] ) ? sanitize_text_field( wp_unslash( $_POST["plugin_file"] ) ) : '';

				// Check our nonce, if they don't match then bounce!
				if (! wp_verify_nonce( $nonce, 'construction_lite_plugin_installer_nonce' ))
					wp_die( esc_html__( 'Error - unable to verify nonce, please try again.', 'construction-lite') );


         		// Include required libs for installation
				require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
				require_once ABSPATH . 'wp-admin/includes/class-wp-ajax-upgrader-skin.php';
				require_once ABSPATH . 'wp-admin/includes/class-plugin-upgrader.php';

				// Get Plugin Info
				$api = $this->construction_lite_call_plugin_api($plugin);

				$skin     = new WP_Ajax_Upgrader_Skin();
				$upgrader = new Plugin_Upgrader( $skin );
				$upgrader->install($api->download_link);

				$plugin_file = esc_html($plugin).'/'.esc_html($plugin_file);

				if($api->name) {
					if($plugin_file) {
						activate_plugin($plugin_file);
						echo "success";
						die();
					}
				}
				echo "fail";

				die();
			}

			/** Plugin Offline Installation Ajax **/
			public function construction_lite_plugin_offline_installer_callback() {

				$file_location = isset( $_POST['file_location'] ) ? sanitize_text_field( wp_unslash( $_POST['file_location'] ) ) : '';
				$file = isset( $_POST['file'] ) ? sanitize_text_field( wp_unslash( $_POST['file'] ) ) : '';
				$plugin_directory = ABSPATH . 'wp-content/plugins/';

				$zip = new ZipArchive;
				if ($zip->open(esc_html($file_location)) === TRUE) {
				    $zip->extractTo($plugin_directory);
				    $zip->close();

				    activate_plugin($file);
					die();
				} else {
				    echo 'failed';
				}

				die();
			}

			/** Plugin Offline Activation Ajax **/
			public function construction_lite_plugin_offline_activation_callback() {

				$plugin = isset( $_POST['plugin'] ) ? sanitize_text_field( wp_unslash( $_POST['plugin'] ) ) : '';
				$plugin_file = ABSPATH . 'wp-content/plugins/'.esc_html($plugin).'/'.esc_html($plugin).'.php';

				if(file_exists($plugin_file)) {
					activate_plugin($plugin_file);
				} else {
					echo "Plugin Doesn't Exists";
				}

				die();

			}

			/** Plugin Activation Ajax **/
			public function construction_lite_plugin_activation_callback(){

				if ( ! current_user_can('install_plugins') )
					wp_die( esc_html__( 'Sorry, you are not allowed to activate plugins on this site.', 'construction-lite' ) );

				$nonce = isset( $_POST["nonce"] ) ? sanitize_text_field( wp_unslash( $_POST["nonce"] ) ) : '';
				$plugin = isset( $_POST["plugin"] ) ? sanitize_text_field( wp_unslash( $_POST["plugin"] ) ) : '';
				$plugin_file = isset( $_POST["plugin_file"] ) ? sanitize_text_field( wp_unslash( $_POST["plugin_file"] ) ) : '';

				// Check our nonce, if they don't match then bounce!
				if (! wp_verify_nonce( $nonce, 'construction_lite_plugin_activate_nonce' ))
					die( esc_html__( 'Error - unable to verify nonce, please try again.', 'construction-lite' ) );


	         	// Include required libs for activation
				require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
				require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
				require_once ABSPATH . 'wp-admin/includes/class-plugin-upgrader.php';


				// Get Plugin Info
				$api = $this->construction_lite_call_plugin_api(esc_attr($plugin));

				$plugin_file = esc_html($plugin).'/'.esc_html($plugin_file);

				if($api->name){
					
					$status = 'success';
					//if($plugin_file){
						activate_plugin($plugin_file);
						$msg = $api->name .' successfully activated.';
					//}
				} else {
					$status = 'failed';
					$msg = esc_html__('There was an error activating $api->name', 'construction-lite');
				}

				$json = array(
					'status' => $status,
					'msg' => $msg,
				);

				wp_send_json($json);

			}

			public function all_required_plugins_installed() {

		      	$companion_plugins = $this->companion_plugins;
				$show_success_notice = false;

				foreach($companion_plugins as $plugin) {

					$path = WP_PLUGIN_DIR.'/'.esc_attr($plugin['slug']).'/'.esc_attr($plugin['filename']);

					if(file_exists($path)) {
						if(class_exists($plugin['class'])) {
							$show_success_notice = true;
						} else {
							$show_success_notice = false;
							break;
						}
					} else {
						$show_success_notice = false;
						break;
					}
				}

				return $show_success_notice;
	      	}

		  	public function get_local_dir_path($plugin) {

	      		$url = wp_nonce_url(admin_url('themes.php?page=construction-welcome&section=import_demo'),'constructera-file-installation');
				if (false === ($creds = request_filesystem_credentials($url, '', false, false, null) ) ) {
					return; // stop processing here
				}

	      		if ( ! WP_Filesystem($creds) ) {
					request_filesystem_credentials($url, '', true, false, null);
					return;
				}

				global $wp_filesystem;
				$file = $wp_filesystem->get_contents( $plugin['location'] );

				$file_location = get_template_directory().'/welcome/plugins/'.$plugin['slug'].'.zip';

				$wp_filesystem->put_contents( $file_location, $file, FS_CHMOD_FILE );

				return $file_location;
	      	}

		}

		new construction_lite_Welcome();

	endif;

	/** Initializing Demo Importer if exists **/
	if(class_exists('Instant_Demo_Importer')) :
		$demoimporter = new Instant_Demo_Importer();

		$demoimporter->demos = array(

			'demo-one' => array(
				'title' => esc_html__('Demo One', 'construction-lite'),
				'name' => 'demo-one',
				'screenshot' => get_template_directory_uri().'/welcome/demos/demo-one/screen.jpg',
				'home_page' => 'home',
				'menus' => array(
					'primary menu' => 'primary',
					'Footer Menu' => 'footer'
				)
			),
			'demo-two' => array(
				'title' => esc_html__('Demo Two', 'construction-lite'),
				'name' => 'demo-two',
				'screenshot' => get_template_directory_uri().'/welcome/demos/demo-two/screen.jpg',
				'home_page' => 'home',
				'menus' => array(
					'primary menu' => 'primary',
					'Footer Menu' => 'footer'
				)
			),
			'demo-three' => array(
				'title' => esc_html__('Demo Three', 'construction-lite'),
				'name' => 'demo-three',
				'screenshot' => get_template_directory_uri().'/welcome/demos/demo-three/screen.jpg',
				'home_page' => 'home',
				'menus' => array(
					'primary menu' => 'primary',
					'Footer Menu' => 'footer'
				)
			),
		);

		$demoimporter->demo_dir = get_template_directory().'/welcome/demos/'; // Path to the directory containing demo files
		//$demoimporter->options_replace_url = 'http://demo.accesspressthemes.com/constructera-pro/main'; // Set the url to be replaced with current siteurl
		$demoimporter->option_name = ''; // Set the the name of the option if the theme is based on theme option

		$demoimporter->set_customizer_options(get_template_directory().'/welcome/demos/classical-demo/customizer_options.dat');
	endif;
?>
