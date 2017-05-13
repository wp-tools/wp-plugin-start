<?php
/**
 * Component abstract.
 *
 * @package   ThePlugin
 * @copyright Copyright(c) YYYY, Plugin Author
 * @licence http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace ThePlugin\View;

use ThePlugin\ComponentAbstract;

class AdminMenu extends ComponentAbstract {

	public function register_hooks() {
		add_action( 'admin_menu', function() {
			add_menu_page(
				'The Plugin',
				'The Plugin',
				'manage_options',
				'the-plugin-menu',
				array( $this, 'display' ),
				$this->plugin->get_assets_url( 'images/admin-menu-icon.svg' )
			);
		} );


		// Register other hooks here.
	}

	public function display() {
		?>
			<div class="wrap">
				<h2><?php esc_html_e( 'The Plugin Settings', 'the-plugin' ); ?></h2>
			</div>
		<?php
	}
}
