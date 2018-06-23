<?php
/**
 * AdminMenu.
 *
 * @package   ThePlugin
 * @copyright Copyright(c) YYYY, Plugin Author
 * @licence http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2 (GPL-2.0)
 */

namespace ThePlugin\View;

use ThePlugin\ComponentAbstract;

/**
 * Class AdminMenu
 */
class AdminMenu extends ComponentAbstract {

	/**
	 * Register hooks for this view.
	 *
	 * @return void
	 */
	public function register_hooks() {
		add_action(
			'admin_menu', function () {
				add_menu_page(
					'The Plugin',
					'The Plugin',
					'manage_options',
					'the-plugin-menu',
					array( $this, 'render' ),
					$this->plugin->get_assets_url( 'images/admin-menu-icon.svg' )
				);
			}
		);
		// Register other hooks here.
	}

	/**
	 * Render the Menu Page.
	 *
	 * @return void
	 */
	public function render() {
		?>
		<div class="wrap">
			<h2><?php esc_html_e( 'The Plugin Settings', 'the-plugin' ); ?></h2>
			<p class="description"><?php esc_html_e( 'This is a description for this page.', 'the-plugin' ); ?></p>
		</div>
		<?php
	}
}
