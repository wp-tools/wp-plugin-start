<?php
/**
 * Test_The_Plugin
 *
 * @package ThePlugin
 */

namespace ThePlugin;

/**
 * Class Test_The_Plugin
 *
 * @package ThePlugin
 */
class Test_The_Plugin extends \WP_UnitTestCase {
	/**
	 * Test _the_plugin_php_version_error().
	 *
	 * @see _the_plugin_php_version_error()
	 */
	public function test_the_plugin_php_version_error() {
		ob_start();
		_the_plugin_php_version_error();
		$buffer = ob_get_clean();
		$this->assertContains( '<div class="error">', $buffer );
	}

	/**
	 * Test _the_plugin_php_version_text().
	 *
	 * @see _the_plugin_php_version_text()
	 */
	public function test_the_plugin_php_version_text() {
		$this->assertContains( 'The Plugin plugin error:', _the_plugin_php_version_text() );
	}
}
