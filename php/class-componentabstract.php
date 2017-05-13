<?php
/**
 * Component abstract.
 *
 * @package   ThePlugin
 * @copyright Copyright(c) YYYY, Plugin Author
 * @licence http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace ThePlugin;

/**
 * Class ComponentAbstract
 *
 * @package ThePlugin
 */
abstract class ComponentAbstract implements ComponentInterface {

	/**
	 * @var PluginInterface
	 */
	protected $plugin;

	/**
	 * Set the plugin so that it can be referenced later.
	 *
	 * @param PluginInterface $plugin The plugin.
	 *
	 * @return ComponentInterface $this
	 */
	public function set_plugin( PluginInterface $plugin ) {
		$this->plugin = $plugin;
		return $this;
	}

	/**
	 * Register any hooks that this component needs.
	 *
	 * @return void
	 */
	abstract public function register_hooks();
}
