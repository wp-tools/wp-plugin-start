# wp-plugin-start
A starting point for new WordPress plugins.

This plugin base requires at least PHP 5.3+ to use interfaces, abstract classes and anonymous functions. PHP 5.4+ is required to make use of *traits*.

Although there is a `tests` folder with some initial tests, this base is not setup out of the box for unit testing.

You might want to override the following in the plugin:

- `The Plugin` to be the name of your plugin.  
- `ThePlugin` with the package and namespace of your plugin.
- `*the-plugin*` slugs, textdomains and handles for the plugin.
- `*the_plugin*` function names.
- `Plugin Author` to your name.
- `https://authorsite.com` to be your url.
- `YYYY` to the current year.
- `0.0.0` to the plugin version.
